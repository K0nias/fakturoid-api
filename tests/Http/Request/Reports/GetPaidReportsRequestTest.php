<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Reports\GetPaidReportsRequest;
use K0nias\FakturoidApi\Model\Filter\Year;
use PHPUnit\Framework\TestCase;

class GetPaidReportsRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new GetPaidReportsRequest(new Year(2015));

        $this->assertSame('reports/2015/paid.json', $request->getUri());
    }
}