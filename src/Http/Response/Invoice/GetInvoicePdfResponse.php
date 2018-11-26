<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\ResponseInterface;

class GetInvoicePdfResponse implements ResponseInterface
{

    /** @var string */
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }


    public function getPdfContent(): string
    {
        return $this->content;
    }

    public function hasError(): bool
    {
        return false;
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return [];
    }

}
