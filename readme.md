## DEV CHALLENGE ##

### Installation ###

* `git clone https://github.com/sefran/challenge.git projectname`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
* `php artisan serve` to start the app on http://localhost:8000/

### Added/modified files for the dev challenge ###

* `app/Http/Controllers/Report/ReportController.php`
* `app/Models/CurrencyConverterService.php`
* `app/Models/CurrencyDummyWebservice.php`
* `app/Models/CurrencyExchangeRateService.php`
* `app/Models/Customer.php`
* `app/Models/DefaultCurrencyConverter.php`
* `app/Models/Transaction.php`
* `app/Providers/AppServiceProvider.php`
* `config/database.php`
* `database/migrations/2016_10_12_123534_create_customers_table.php`
* `database/migrations/2016_10_12_123603_create_transactions_table.php`
* `database/seeds/CustomersTableSeeder.php`
* `database/seeds/DatabaseSeeder.php`
* `database/seeds/TransactionsTableSeeder.php`
* `database/challenge.sqlite`
* `resources/views/index.blade.php`
* `tests/ChallengeTestCase.php`
* `tests/CustomerTest.php`
* `tests/DatabaseSeedTest.php`
* `tests/DefaultCurrencyConverterTest.php`
* `tests/FormTest.php`
* `tests/RoutingTest.php`
* `.env`
* `composer.json`
* `phpunit.xml`
* `readme.md`