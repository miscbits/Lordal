# Lordal

PHP 7.2

Larvel 5.7

VueJS 2.x

To run locally:

copy .env.example to .env

Make sure to have the following variables set
```
DB_CONNECTION=sqlite
QUEUE_CONNECTION=database

GITHUB_CLIENT={GITHUB OUTH CLIENT KEY}
GITHUB_CLIENT_SECRET={GITHUB OUTH SECRET KEY}
GITHUB_URL={https://localhost:8000/github/callback}

GITHUB_WEBHOOK_SECRET={webhook secret key}

GOOGLE_CONSUMER_KEY=
GOOGLE_CONSUMER_SECRET=
GOOGLE_URL={https://localhost:8000/auth/google/callback"}
```

To learn more about creating oauth tokens for github and google check out

https://developer.github.com/apps/building-oauth-apps/
https://developers.google.com/adwords/api/docs/guides/authentication

Note: Google requires that your app has SSL set up. You can set this up with a self signed cert, but this can be a bit complicated. For instructions on setting up a local server for Laravel that can be linked with SSL check out https://laravel.com/docs/5.7/valet

When you set up your local instance with valet, just make sure to change your callback urls from localhost to whatever url you gave your site

Once you have all of that set up you should be ready to provision the app. The local database is set up to use sqlite, however if you have a local instance of MySQL I recommend running it on that as that is what the production server runs. Most likely it will not affect your code, however sqlite does not support foreign keys and ignores commands for the orm to set them up. If you are working with data types for the ORM then you most likely will have to test it like this first as not doing so can introduce bugs into production. 

For info on doing that securely check out
https://docs.docker.com/samples/library/mysql/

Once you do you can set up the credentials in the .env file. 

If you are not working with datatypes in the ORM then you should be good to go with sqlite. Simply create the file with 

```bash
touch database/database.sqlite
```

Once your database is provisioned you need to set up the app keys. You can do so with 

```bash
php artisan key:generate
php artisan passport:keys
php artisan storage:link
```

That should generate secret keys and modify your .env file to have a new app key. 

Once this is done you need to provision the databse. The following should be all you need

```bash
# This command will initialize your databse
# If you add a new migration you can run it 
# again to run new migrations
php artisan migrate

# If your database gets messed up and you want 
# to start from scratch you can also run
php artisan migrate:fresh
```

After that you can fill up the databse with sample data using

```bash
php artisan db:seed
```

Lastly to set up your front end assets (VueJS, bootstrap, webpack, etc), run the asset compilation

```bash
# This will compile your assets in development mode
yarn run dev

# This will compile assets in development mode and 
# then compile every time there is a file change
yarn run watch
```