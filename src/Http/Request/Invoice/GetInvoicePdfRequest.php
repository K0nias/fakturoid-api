<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Invoice;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Invoice\GetInvoicePdfResponse;
use K0nias\FakturoidApi\Model\Invoice\Id;

final class GetInvoicePdfRequest implements RequestInterface
{

    private const REQUEST_URI = 'invoices/%s/download.pdf';

    /** @var \K0nias\FakturoidApi\Model\Invoice\Id */
    private $id;

    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId());
    }

    public function getMethod(): Method
    {
        return Method::GET();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

    public function send(Api $api): GetInvoicePdfResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Invoice\GetInvoicePdfResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
