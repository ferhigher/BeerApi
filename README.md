## Requirements

PHP 7.1 and later.

Symfony 4.4

## How to set up the project

You can install the libraries via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer install
```

## Execute through endpoint



For this we need the symfony server to be working:

``` 
symfony serve -d
 ```
- To filter beers from API: 
```
Example: https://127.0.0.1:8000/beers?food=carne_asada_with
```
This option returns all beers matching the supplied food string, this performs a fuzzy match, if you need to add spaces just add an underscore (_).


- To obtain detail view of just one beer:

```
Example: https://127.0.0.1:8000/beer/133
```
This option returns more details of the beer matching with the supplied id.


##To launch tests:
``` 
php ./vendor/bin/phpunit
