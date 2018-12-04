<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class SearchInvoicesResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getInvoices(): array
    {
        return $this->data;
    }

}
