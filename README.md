# OMDB Laravel
![](https://img.shields.io/github/license/TopherTk/omdb-laravel.svg)
![](https://img.shields.io/github/downloads/TopherTk/omdb-laravel/total.svg)
![](https://img.shields.io/github/issues/tophertk/omdb-laravel.svg)
![](https://img.shields.io/github/languages/code-size/tophertk/omdb-laravel.svg)
![](https://img.shields.io/github/last-commit/tophertk/omdb-laravel.svg)

This package serves as a wrapper for the Open Movie Database(OMDB) Api.  
It is intended to be used with the PHP Laravel Framework  
  
## Installation  
  
*Requirements*  
* [Composer](https://getcomposer.org/)  
* [PHP 7.1](http://php.net/releases/7_1_0.php)  
* [Laravel 5.8.*](https://laravel.com)  
* [A valid OMDB API key](http://www.omdbapi.com/apikey.aspx)  
  
You can install the package using Composer.  
``composer require <tophertk/omdblaravel>``  

**Laravel Versions**
For Laravel >= 5.5 the package will be auto discovered.  
  
For Laravel 5.4 and lower you must register the service provider yourself.  

    config/app.php
    TopherTk\OmdbLaravel\OmdbServiceProvider::class 
  
**Service Provider** 
  
``php artisan vendor:publish --provider="TopherTk\OmdbLaravel\OmdbServiceProvider"``  

Once this command has run you will find an `omdb_laravel.php` file within your app/config folder.  
  
At present this file only contains a reference to the API key stored in the `.env` file.  
  
```php
return [  
 'omdb_api_key' => env("OMDB_API_KEY")];  
```   
## Usage  
To receive data from the API you will first need to instantiate a new query  
this object requires an array containing at least one element to be passed in.  
  
```php
$query = new Query(['title' => 'Air Force One']);  
```  
  
  
Following this you will then need to pass this query to the client.  
  
```php
//Initialize the client and pass the query  
$client = new OmdbClient($query);  
  
//Receive the response in an assoc array  
$client->getMediaInformation();  
```  
By default the package will receive back a JSON object  
and will return an associative array via the `getMediaInformation()` method.  
  
### Query Parameters  
| Parameter | Description | Options  
|---|---|---|  
| imdb_id      | ID assigned on IMDB       | e.g (12345667)  
| title        | Name of the media         | e.g Air Force One  
| media_type   | Type of media             | movie, series, episode  
| release_year | Year of release           | e.g 1997  
| plot         | Media Plot                | short, full  
| season       | Season of a TV show       | season number - 01, 02 etc.. 
| episode      | Episode number of a season| episode number - 12, 13 etc..
  
  
## Credits  
[Open Movie Database API](http://omdbapi.com)  
  
## License  
The MIT License (MIT). Please see License File for more information.
