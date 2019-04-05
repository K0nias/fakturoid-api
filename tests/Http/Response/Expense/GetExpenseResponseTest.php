<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Expense;

use K0nias\FakturoidApi\Http\Response\Expense\GetExpenseResponse;
use PHPUnit\Framework\TestCase;

class GetExpenseResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetExpenseResponse((string) json_encode([
            'id' => 1,
            // ...
        ]));

        $this->assertSame(['id' => 1], $response->getExpense());
    }

}
