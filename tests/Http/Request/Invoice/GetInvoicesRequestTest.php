<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Invoice\GetInvoicesRequest;
use K0nias\FakturoidApi\Model\Invoice\Filter\Parameters;
use K0nias\FakturoidApi\Model\Invoice\Status;
use PHPUnit\Framework\TestCase;

class GetInvoicesRequestTest extends TestCase
{

    public function testParameters(): void
    {
        $status = new Status('paid');
        $parameters = (new Parameters())
            ->status($status);

        $request = new GetInvoicesRequest($parameters);

        $data = $request->getData();

        $this->assertNotEmpty($data);
        $this->assertArrayHasKey('status', $data);
        $this->assertSame($status->getStatus(), $data['status']);
    }

}
