<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;
use K0nias\FakturoidApi\Model\Invoice\Id;

final class CreateInvoiceResponse extends CommonJsonResponse
{

    public function getId(): Id
    {
        return new Id($this->data['id']);
    }

}