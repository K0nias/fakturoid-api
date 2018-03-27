<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

final class GetInvoiceResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getInvoice(): array
    {
        return $this->data;
    }
}