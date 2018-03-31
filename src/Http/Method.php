<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http;

final class Method
{
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    const PATCH_METHOD = 'PATCH';
    const DELETE_METHOD = 'DELETE';

    /**
     * @var string
     */
    private $method;

    /**
     * @param string $method
     */
    public function __construct(string $method)
    {
        $method = strtoupper($method);

        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtoupper($this->method);
    }

    /**
     * @param Method $method
     *
     * @return bool
     */
    public function sameAs(Method $method): bool
    {
        return $method->getMethod() === $this->getMethod();
    }

    /**
     * @return Method
     */
    public static function GET(): self
    {
        return new self(self::GET_METHOD);
    }

    /**
     * @return Method
     */
    public static function POST(): self
    {
        return new self(self::POST_METHOD);
    }

    /**
     * @return Method
     */
    public static function PATCH(): self
    {
        return new self(self::PATCH_METHOD);
    }

    /**
     * @return Method
     */
    public static function DELETE(): self
    {
        return new self(self::DELETE_METHOD);
    }
}