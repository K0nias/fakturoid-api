Fakturoid API
------------

Unofficial Fakturoid.cz API PHP wrapper. Official [library](https://github.com/fakturoid/fakturoid-php) and 
[API documentation](http://docs.fakturoid.apiary.io/)



Installation
------------

The recommended way to install this library is through [Composer](http://getcomposer.org):

    composer require k0nias/fakturoid-api "master-dev"
    
    
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
    $filterParameters->status(new Status(Status::STATUS_OPEN))
                    ->page(2);
    
    // @var \K0nias\FakturoidApi\Http\Response\GetInvoicesResponse
    $response = $api->process(new GetInvoicesRequest($filterParameters));
```
    
    
Tests
-----

To run the test suite, you need [Composer](http://getcomposer.org) and [PHPUnit](https://phpunit.de):

    composer install
    phpunit


TODO:
-----

implements methods:

 invoices:
 - update invoice
 - fire invoice
 - create invoice
 - delete invoice
 
 expenses:
 - get expenses
 - get expense
 - search expense
 - update expense
 - fire expense
 - create expense
 - delete expense
 
 subjects:
  - get subjects
  - get subject
  - search subject
  - update subject
  - create subject
  - delete subject
  
 generators:
  - get generators
  - get generator
  - get template generators
  - get recurring template generators
  - update generator
  - create generator
  - delete generator
  
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
  
 
 