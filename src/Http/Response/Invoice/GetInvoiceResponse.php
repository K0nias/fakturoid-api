<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetInvoiceResponse extends CommonJsonResponse
{

    /**
     * @return mixed[]
     */
    public function getInvoice(): array
    {
        return $this->data;
    }

}
