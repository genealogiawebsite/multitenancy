<?php

namespace LaravelEnso\Multitenancy\Commands;

use Illuminate\Console\Command;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Jobs\Migrate as Job;

class Migrate extends Command
{
    protected $signature = 'enso:tenant:migrate {--all=false} {--tenantId}';

    protected $description = 'Performs tenant(s) migrations';

    public function dispatch(Company $company): void
    {
        $this->line(__('Migrating tables for company :company', ['company' => $company->name]));

        Job::dispatch($company);
    }
}
