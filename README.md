Fakturoid API
------------

Unofficial Fakturoid.cz API PHP wrapper. Official [library](https://github.com/fakturoid/fakturoid-php) and 
[API documentation](http://docs.fakturoid.apiary.io/)


Reasons to write another API wrapper
------------

1) more strict data binding
2) PHP7 support
3) better test coverage
4) my first OSS attempt :)



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
    
    // @var \K0nias\FakturoidApi\Http\Response\GetInvoicesResponse
    $response = $api->process(new GetInvoicesRequest($filterParameters));
```
    
    
Tests
-----

To run the test suite, you need [Composer](http://getcomposer.org) and [PHPUnit](https://phpunit.de):

    composer install
    composer test


TODO:
-----

implements methods:

 generators:
  - get generator
  
 messages:
  - create message
  
 events:
  - get events
  - get paid events
  
reports:
  - get reports
  - get reports paid
  - get reports vat
  
 todos:
  - get todos
  - toggle completion
  
  
 Refactor *\Event to accept date for methods like pay
 
TODO2:
-----
 - add testing for ItemCollection to have at least one item
 - add testing for Line#(quantity, vatRate and unitPrice) to be positive number
  
 
 