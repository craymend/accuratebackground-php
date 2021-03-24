# Accurate Background Checks API PHP SDK

[![Software License][ico-license]](LICENSE)


Query Accurate API for Candidates and Orders

## Installation

Via composer.<br/>
Add the following to your composer.json
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/craymend/accuratebackground-php.git"
    }
],
"require": {
    "craymend/accuratebackground-php": "dev-master"
},
```
```
composer update
```

Run 

    artisan vendor:publish

Now in your .env file, define your Tokeet credentials:
```php
ACCURATE_API_CLIENT_ID=<your Accurate API client id>
ACCURATE_API_SECRET=<your Accurate API secret>
```
## Check Accurate API is available example
```php
use Craymend\AccurateSdk\Api\ApiBase;

$queryObj = new ApiBase();
        
$response = $queryObj->checkAlive();
```

## Create Accurate candidate example
```php
use Craymend\AccurateSdk\Api\Candidate;

$data = [
    'firstName' => 'John',
    'lastName' => 'PASS',
    'email' => 'john@email.com',
    'address' => '123 Main St.',
    'city' => 'Irvine',
    'region' => 'CA',
    'country' => 'US',
    'postalCode' => '12345',
    'dateOfBirth' => '1990-01-01', 
    'phone' => '1231231234',
    'ssn' => '123121234',
];

$queryObj = new Candidate();
$response = $queryObj->createCandidate($data);

if($response->status === 'success'){
    $candidate = $response->data;
    $candidateId = $candidate->id;
}
```

 ## Create Accurate order example
```php
use Craymend\AccurateSdk\Api\Order;

$data = [
    'candidateId' => $candidateId,
    'packageType' => 'PKG_BASIC',
    'workflow' => 'EXPRESS',
    'jobLocation.city' => 'Hollywood',
    'jobLocation.region' => 'CA',
    'jobLocation.country' => 'US'
];

$queryObj = new Order();
$response = $queryObj->createOrder($data);

if($response->status === 'success'){
    $order = $response->data;

    echo json_encode($order);
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.



[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
