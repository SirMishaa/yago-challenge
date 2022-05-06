<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Yago_Logo_%281%29.png/1200px-Yago_Logo_%281%29.png"></a></p>


## Yago Challenge
![Ci Workflow](https://github.com/SirMishaa/yago-challenge/actions/workflows/ci.yml/badge.svg)

This repository contains the code for the Yago challenge. It is realized with the [Laravel](https://laravel.com) framework under [PHP 8.1](https://www.php.net/releases/8.1/en.php) programming language.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

The following tools and libraries are also used:

- [PostgreSQL](https://www.postgresql.org/) - Powerful, open source object-relational database
- [Redis](https://redis.io/) - Scalable inmemory data store
- [Node.js](https://nodejs.org/) - JavaScript runtime environment
- [TailwindCSS](https://tailwindcss.com/) - CSS framework
- [Larastan](https://github.com/nunomaduro/larastan) - Static code analyzer for PHP
- [Laravel Mix](https://laravel-mix.com/) - An elegant wrapper around Webpack
- [Pest](https://pestphp.com/) - An elegant PHP Testing Framework
- [Github Actions](https://github.com/features/actions) - Automated workflow for CI/CD
- [Docker](https://www.docker.com/) - Containerization platform

## Set up project
The recommended way to set up the project is to use [Docker](https://www.docker.com/) and in particular [Laravel Sail](https://laravel.com/docs/9.x/sail) which provides an integration with it.

- First step, clone this repository :
```
git clone https://github.com/SirMishaa/yago-challenge
```

- Now copy `.env.example` to `.env` and fill it with the correct values.
````
cd yago-challenge/
cp .env.example .env
````
- In the .env file, you must fil `WWWUSER` and `WWWGROUP` with the correct user and group UID and GID :
```
 id -u $USER
 id -g $USER
```
This will avoid permission problems when creating files in the Docker container, as they will be created with the same user.
- Now it's time to install composer dependencies to be able to run [Laravel Sail](https://laravel.com/docs/9.x/sail) :
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
This command will install all the PHP dependencies.

- You can execute Laravel Sail with this command after the php dependencies are installed : 
```
./vendor/bin/sail up
```
This operation may take a little time, while the image is being built
In the meantime, I suggest you set up a bash alias for the sail command :
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

- Normally, once completed, the application should be launched as well as the database containers. Now we need to generate an application key using the following command:
```
sl artisan key:generate
# If you don't have set up an alias, you can use the following command instead :
./vendor/bin/sail key:generate
```
- Run the migrations & seeding using the following command:
```
sl artisan migrate:fresh --seed
# Or
./vendor/bin/sail migrate:fresh --seed
```
- And the last step, install Node.js dependencies build the assets using the following command:
```
sl yarn install
sl yarn run production
# Here, you can also use sl yarn run dev if you're on a development environment.
```

# Available scripts
Here is the list of scripts you can use :
- `sl composer pest` : Run unit tests
- `sl composer phpstan` : Run the static code analysis tool
- `sl composer ide-helper` : Generate IDE helper files using [Laravel IDE helper package](https://github.com/barryvdh/laravel-ide-helper)
- `sl yarn run production` : Build the assets
- `sl yarn run dev` : Build the assets in development mode (with reloading)

To interact with the Laravel application and perform actions such as clearing the cache, launching migrations, that kind of thing, you have to use [Laravel artisan](https://laravel.com/docs/9.x/artisan).

Artisan is the command line interface included with Laravel. Artisan exists at the root of your application as the artisan script and provides a number of helpful commands that can assist you while you build your application. To view a list of all available Artisan commands, you may use the list command:
```
sl artisan list
```
You can also use this site which is very convenient to search for an order and to see the available parameters : https://artisan.page/
# Architecture
In this section, I will explain the architecture of the application as well as the different folders and their uses. Know that it is very close to a classic Laravel architecture.

- ``.github``: Github actions workflow and Github related stuff.
- ``app``: Main folder of the application.
- ``bootstrap``: Contains bootstrap files (main entry file).
- ``config``: Related configuration files for every aspect of the app.
- ``database``: Database, migrations, factories & seeders files.
- ``lang``: Contains all the translations files.
- ``node_modules``: Contains all the node.js dependencies.
- ``public``: Contains all the static files (like favicon, robots.txt, etc).
- ``resources``: Contains all the assets and views.
- ``routes``: Contains all the routes of the application.
- ``storage``: Contains storage like upload files, logs, cache, etc.
- ``tests``: Contains unit tests files.
- ``vendor``: Contains all the composer (php) dependencies.

The Http part of the application is in the folder ``app/Http``. You can find middleware, requests and controllers in this folder.

The model part of the application is in the folder ``app/Models``. You can find all the models in this folder.

The definition of models (like properties, relationships, etc) is in the database part of the application, on the folder ``database/migrations``. 

# About the challenge
For my part, I chose to make a rather simple monolithic architecture, but I cut out the quote retrieval in a dedicated service.

It all starts with the HTML form in `views/forms/rc-pro/rcpro-form.blade.php` [(here in Github)](https://github.com/SirMishaa/yago-challenge/blob/main/resources/views/forms/rc-pro/rcpro-form.blade.php), this file will include several subparts of the form in order to properly organize the views. 

When you submit the form, it will call the `QuoteController` but first it will pass the validation rules defined in the `GetQuoteRequest` class. (`app/Http/Requests/GetQuoteRequest.php`) [(here in Github)](https://github.com/SirMishaa/yago-challenge/blob/main/app/Http/Requests/GetQuoteRequest.php). If the validation fails, Laravel will set the errors in the session and redirect you back to the form and it will show the errors.

If it succeeds, the controller will build a new `GetQuoteRequestDTO` object [(here in Github)](https://github.com/SirMishaa/yago-challenge/blob/main/app/Dto/ProfessionalLiability/GetQuoteRequestDTO.php) with the data from the form. Then, it will call the `QuoteService` to get the quote and persist it in the database.

Small subtlety, the options that we can see in the HTML part of the form are automatically generated according to several enumerations. (See `app/Enum/ProfessionalLiability/`). I chose to use enumerations in order to be as generic as possible and to use almost the same code for other kinds of professions.

The ProfessionalLiabilityService, which is responsible for getting a quote will get its configuration from a configuration file.






## License
This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
