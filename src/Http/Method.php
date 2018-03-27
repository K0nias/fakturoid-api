<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http;

final class Method
{
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    /**
     * @var string
     */
    private $method;

    public function __construct(string $method)
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtoupper($this->method);
    }


    public function sameAs(Method $method): bool
    {
        return $method->getMethod() === $this->getMethod();
    }

    public static function GET(): self
    {
        return new self(self::GET_METHOD);
    }


}