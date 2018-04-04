<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\GetRegularInvoicesRequest;
use K0nias\FakturoidApi\Model\Invoice\Filter\Parameters;
use K0nias\FakturoidApi\Model\Invoice\Status;
use PHPUnit\Framework\TestCase;

class GetRegularInvoicesRequestTest extends TestCase
{
    public function testParameters()
    {
        $status = new Status('paid');
        $parameters = (new Parameters())
            ->status($status);

        $request = new GetRegularInvoicesRequest($parameters);

        $data = $request->getData();

        $this->assertNotEmpty($data);
        $this->assertArrayHasKey('status', $data);
        $this->assertSame($status->getStatus(), $data['status']);
    }
}