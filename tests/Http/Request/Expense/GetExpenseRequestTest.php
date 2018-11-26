<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Request\Expense\GetExpenseRequest;
use K0nias\FakturoidApi\Model\Expense\Id;
use PHPUnit\Framework\TestCase;

class GetExpenseRequestTest extends TestCase
{

    public function testUri(): void
    {
        $request = new GetExpenseRequest(new Id(1));

        $this->assertSame('expenses/1.json', $request->getUri());
    }

}
