<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetRegularInvoicesResponse extends CommonJsonResponse
{
    public function getInvoices(): array
    {
        return $this->data;
    }
}