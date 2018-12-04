<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Invoice\Id;

final class DeleteInvoiceRequest implements RequestInterface
{

    private const REQUEST_URI = 'invoices/%s.json';

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
        return Method::DELETE();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

}
