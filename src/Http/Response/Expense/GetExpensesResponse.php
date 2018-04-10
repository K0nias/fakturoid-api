<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Expense;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetExpensesResponse extends CommonJsonResponse
{
    public function getExpenses(): array
    {
        return $this->data;
    }
}