<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;

final class Method
{
    const GET_METHOD = 'GET';
    const POST_METHOD = 'POST';
    const PATCH_METHOD = 'PATCH';
    const DELETE_METHOD = 'DELETE';

    private const AVAILABLE_METHODS = [
        self::GET_METHOD,
        self::POST_METHOD,
        self::PATCH_METHOD,
        self::DELETE_METHOD,
    ];

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

        if ( ! in_array($method, self::AVAILABLE_METHODS)) {
            throw InvalidOptionParameterException::createFrom($method, self::AVAILABLE_METHODS, 'Invalid http method. Given: "%s". Available methods: "%s".');
        }

        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
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