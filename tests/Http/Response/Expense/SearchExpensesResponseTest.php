<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Expense;

use K0nias\FakturoidApi\Http\Response\Expense\SearchExpensesResponse;
use PHPUnit\Framework\TestCase;

class SearchExpensesResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new SearchExpensesResponse((string) json_encode([
            [
                'id' => 201,
                // ...
            ],
            [
                'id' => 202,
                // ...
            ],
        ]));

        $this->assertSame(
            [
                ['id' => 201],
                ['id' => 202],
            ],
            $response->getExpenses()
        );
    }

}
