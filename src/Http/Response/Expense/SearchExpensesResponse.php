<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Expense;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class SearchExpensesResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getExpenses(): array
    {
        return $this->data;
    }

}
