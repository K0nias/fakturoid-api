<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Reports\GetVatReportsRequest;
use K0nias\FakturoidApi\Model\Filter\Year;
use PHPUnit\Framework\TestCase;

class GetVatReportsRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new GetVatReportsRequest(new Year(2015));

        $this->assertSame('reports/2015/vat.json', $request->getUri());
    }
}