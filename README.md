Fakturoid API
------------

Unofficial Fakturoid.cz API PHP wrapper. Official [library](https://github.com/fakturoid/fakturoid-php) and 
[API documentation](http://docs.fakturoid.apiary.io/)


Reasons to write another API wrapper
------------

1) more strict data binding
2) PHP7 support
3) better test coverage



Installation
------------

The recommended way to install this library is through [Composer](http://getcomposer.org):

    composer require k0nias/fakturoid-api:dev-master
    
    
Usage  
-----
```php
    use K0nias\FakturoidApi\Api;
    use K0nias\FakturoidApi\Http\Request\GetInvoicesRequest;
    use K0nias\FakturoidApi\Model\Invoice\Filter\Parameters;
    use K0nias\FakturoidApi\Model\Invoice\Status;

    require_once __DIR__.'/vendor/autoload.php';
    
    $slug = 'test';
    $email = 'test@test.cz';
    $apiToken = 'xxx';
    
    $api = new Api($slug, $email, $apiToken);
    
    $filterParameters = new Parameters();
    $filterParameters->status(Status::open())
                    ->page(2);
    
    // generic version of getting response for request
    // @var \K0nias\FakturoidApi\Http\Response\ResponseInterfac
    $response = $api->process(new GetInvoicesRequest($filterParameters));
    
    // more specific version of getting response for request 
    // @var \K0nias\FakturoidApi\Http\Response\GetInvoicesResponse $response
    $response = (new GetInvoicesRequest($filterParameters))->send($api);
```
    
    
Tests
-----

To run the test suite, you need [Composer](http://getcomposer.org) and [PHPUnit](https://phpunit.de):

    composer install
    composer test
