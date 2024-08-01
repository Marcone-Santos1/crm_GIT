composer create-project --prefer-dist laravel/laravel multi-tenant-api

cd multi-tenant-api/

composer require stancl/tenancy

php artisan tenancy:install

php artisan make:middleware IdentifyTenantByJwt

php artisan make:model Tenant

php artisan make:migration add_company_id_to_tenants_table --table=tenants

php artisan migrate

php artisan make:command CreateTenant

php artisan tenant:create <company_id>