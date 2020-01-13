## How to use

- Clone the repository
- Run `composer install`
- Copy `.env.example` file to `.env` and change the needed values
- Run `php database/create` to create the table structure
- Run `php database/seed` to initialize the table with some sample data
- Run `php task.php` to run the desired script

**Note:** if you want to check the results of running `php task.php` on the sample input data you can find those results in `database/sample-data-results.sql` and you can seed them into the database also by running `php dabase/seed-results`