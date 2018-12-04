<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

/**
 * used by Client\ClientInterface for data transfer between layer
 */
final class Response
{

    /** @var int */
    private $statusCode;

    /** @var string */
    private $content;

    public function __construct(int $statusCode, string $content = '')
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}
