## Assumptions

I have made some assumptions about this hypotheical application to make it doable and at the same time matches the required challenges from your side.

* This application is not translating the data already saved in database. It's feeded with a new list of names. Makes needed translations depending on what's already saved in the database and saves the results to the database. i.e. There's no seed command now. The translation work happens first on the input data then it's inserted alongside with its translations.   
* We can think about hits coming with the input data as weight which is probably has been measured from another system or an old run of this system. This hits value is incremented whenever the input data contains a name that's already saved in our database.Or when we encounter a translation that was at the same time one of the names in the input data.  
* We don't translate names from the input data that was already saved in the database. But we don't reference a translation from another record. i.e. after getting the translation we don't back to check if that translation was already saved in another record.


## How to use

- Clone the repository
- Run `composer install`
- Copy `.env.example` file to `.env` and change the needed values
- Run `php database/create` to create the table structure
- Run `php app.php` to run the desired script
