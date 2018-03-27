<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

final class GetInvoicesResponse extends CommonJsonResponse
{
    public function getInvoices(): array
    {
        return $this->data;
    }
}