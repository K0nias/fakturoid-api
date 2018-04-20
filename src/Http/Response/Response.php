<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

/**
 * used by Client\ClientInterface for data transfer between layer
 *
 * @internal
 */
final class Response
{

    /**
     * @var int
     */
    private $statusCode;
    /**
     * @var string
     */
    private $content;


    /**
     * @param int    $statusCode
     * @param string $content
     */
    public function __construct(int $statusCode, string $content = '')
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}