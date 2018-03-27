<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;


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
}