<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Expense;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetExpenseResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getExpense(): array
    {
        return $this->data;
    }
}