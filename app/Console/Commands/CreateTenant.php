<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create {company_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new tenant';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $company_id = $this->argument('company_id');

        Tenant::create([
            'id' => Str::uuid(),
            'company_id' => $company_id,
            'data' => [
                'company_id' => $company_id
            ],
        ]);


        // app(TenantDatabaseManager::class)->createDatabase($tenant);

        $this->info("Tenant $company_id created successfully with company_id $company_id.");
    }
}
