<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Invoice;

use K0nias\FakturoidApi\Http\Response\ResponseInterface;


class GetInvoicePdfResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }


    /**
     * @return string
     */
    public function getPdfContent(): string
    {
        return $this->content;
    }

    public function hasError(): bool
    {
        return false;
    }

    public function getErrors(): array
    {
        return [];
    }


}
