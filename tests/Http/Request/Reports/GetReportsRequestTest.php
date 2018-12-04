<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Reports;

use K0nias\FakturoidApi\Http\Request\Reports\GetReportsRequest;
use K0nias\FakturoidApi\Model\Filter\Year;
use PHPUnit\Framework\TestCase;

class GetReportsRequestTest extends TestCase
{

    public function testUri(): void
    {
        $request = new GetReportsRequest(new Year(2015));

        $this->assertSame('reports/2015.json', $request->getUri());
    }

}
