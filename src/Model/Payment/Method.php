<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Payment;

final class Method
{

    public const BANK_METHOD = 'bank';
    public const COD_METHOD = 'cod';
    public const CASH_METHOD = 'cash';
    public const CARD_METHOD = 'card';
    public const PAYPAL_METHOD = 'paypal';

    private const AVAILABLE_METHODS = [
        self::BANK_METHOD,
        self::COD_METHOD,
        self::CASH_METHOD,
        self::CARD_METHOD,
        self::PAYPAL_METHOD,
    ];

    /** @var string */
    private $method;

    public function __construct(string $method)
    {
        if ( ! in_array($method, self::AVAILABLE_METHODS)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom($method, self::AVAILABLE_METHODS);
        }

        $this->method = $method;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public static function bank(): self
    {
        return new self(self::BANK_METHOD);
    }

    public static function cod(): self
    {
        return new self(self::COD_METHOD);
    }

    public static function cash(): self
    {
        return new self(self::CASH_METHOD);
    }

    public static function card(): self
    {
        return new self(self::CARD_METHOD);
    }

    public static function payPal(): self
    {
        return new self(self::PAYPAL_METHOD);
    }

}
