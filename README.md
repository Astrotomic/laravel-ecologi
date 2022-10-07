> **Warning**  
> This project is **abandoned** - you can use the general PHP [**ecologi-sdk**](https://github.com/Astrotomic/ecologi-sdk).  
> `composer require astrotomic/ecologi-sdk`

# Laravel Ecologi

## Installation

```bash
composer require astrotomic/laravel-ecologi
```

## Configuration

**config/services.php**

```php
return [
    // ...
    'ecologi' => [
        'username' => 'astrotomic',
        'api_key' => env('ECOLOGI_API_KEY'),
        'sandbox' => env('APP_ENV') !== 'production',
    ],
    // ...
];
```

## Usage

```php
use Astrotomic\Ecologi\Facades\Ecologi;

// enable/disable sandbox mode on the fly
Ecologi::sandbox(true);

/** @link https://docs.ecologi.com/docs/public-api-docs/API/Impact-API.v1.yaml/paths/~1impact~1carbon/post */
$response = Ecologi::purchaseCarbonOffset(0.746, Ecologi::UNIT_T);

/** @link https://docs.ecologi.com/docs/public-api-docs/API/Impact-API.v1.yaml/paths/~1impact~1trees/post */
$response = Ecologi::purchaseTrees(1, 'opendor.me registration');

/** @link https://docs.ecologi.com/docs/public-api-docs/API/Reporting-API.v1.yaml/paths/~1users~1%7Busername%7D~1carbon-offset/get */
$response = Ecologi::reportCarbonOffset(); // report for configured username
$response = Ecologi::reportCarbonOffset('astrotomic'); // report for given username

/** @link https://docs.ecologi.com/docs/public-api-docs/API/Reporting-API.v1.yaml/paths/~1users~1%7Busername%7D~1trees/get */
$response = Ecologi::reportTrees(); // report for configured username
$response = Ecologi::reportTrees('astrotomic'); // report for given username

/** @link https://docs.ecologi.com/docs/public-api-docs/API/Reporting-API.v1.yaml/paths/~1users~1%7Busername%7D~1impact/get */
$response = Ecologi::reportImpact(); // report for configured username
$response = Ecologi::reportImpact('astrotomic'); // report for given username
```
