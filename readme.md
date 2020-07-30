# Client data

This app loads data from locally hosted api every 3 seconds.

Technologies used: Datatables javascript library for tables, Symfony 5 for backend.

To run tests (only made 1), type `composer test`

## Instalation

Run composer to install dependencies. 
```sh
$ composer install 
```

To run app you can start php server 
```sh
$ php -S localhost:8000 -t public
```

Or symfony server if you have symfony cli installed.
```sh
$ symfony server:start
```

## What is missing?

Due to lack of time and far from perfect front-end knowledge comments parts wasn't finished and automated tests is'nt there.