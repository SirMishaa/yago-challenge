<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Yago_Logo_%281%29.png/1200px-Yago_Logo_%281%29.png"></a></p>


## Yago Challenge

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

## License
This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
