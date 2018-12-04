<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http;

final class Method
{

    public const GET_METHOD = 'GET';
    public const POST_METHOD = 'POST';
    public const PATCH_METHOD = 'PATCH';
    public const DELETE_METHOD = 'DELETE';

    private const AVAILABLE_METHODS = [
        self::GET_METHOD,
        self::POST_METHOD,
        self::PATCH_METHOD,
        self::DELETE_METHOD,
    ];

    /** @var string */
    private $method;

    public function __construct(string $method)
    {
        $method = strtoupper($method);

        if ( ! in_array($method, self::AVAILABLE_METHODS)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom(
                $method,
                self::AVAILABLE_METHODS,
                'Invalid http method. Given: "%s". Available methods: "%s".'
            );
        }

        $this->method = $method;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function sameAs(Method $method): bool
    {
        return $method->getMethod() === $this->getMethod();
    }

    /**
     * @return \K0nias\FakturoidApi\Http\Method
     */
    public static function GET(): self
    {
        return new self(self::GET_METHOD);
    }

    /**
     * @return \K0nias\FakturoidApi\Http\Method
     */
    public static function POST(): self
    {
        return new self(self::POST_METHOD);
    }

    /**
     * @return \K0nias\FakturoidApi\Http\Method
     */
    public static function PATCH(): self
    {
        return new self(self::PATCH_METHOD);
    }

    /**
     * @return \K0nias\FakturoidApi\Http\Method
     */
    public static function DELETE(): self
    {
        return new self(self::DELETE_METHOD);
    }

}
