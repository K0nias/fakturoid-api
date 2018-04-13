<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Request\Expense\UpdateExpenseRequest;
use K0nias\FakturoidApi\Model\Expense\Id;
use K0nias\FakturoidApi\Model\Expense\Parameters;
use PHPUnit\Framework\TestCase;

class UpdateInvoiceRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new UpdateExpenseRequest(new Id(1), new Parameters());

        $this->assertSame('expenses/1.json', $request->getUri());
    }
}