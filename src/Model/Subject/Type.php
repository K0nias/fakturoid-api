<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;

final class Type
{
    const CUSTOMER_TYPE = 'customer';
    const SUPPLIER_TYPE = 'supplier';
    const BOTH_TYPE = 'both';

    private const AVAILABLE_TYPES = [
        self::CUSTOMER_TYPE,
        self::SUPPLIER_TYPE,
        self::BOTH_TYPE,
    ];

    /**
     * @var string
     */
    private $type;


    /**
     * @throws InvalidOptionParameterException
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        $type = strtolower($type);

        if ( ! in_array($type, self::AVAILABLE_TYPES)) {
            throw InvalidOptionParameterException::createFrom($type, self::AVAILABLE_TYPES, 'Invalid type. Given: "%s". Available types: "%s".');
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Type
     */
    public static function customer(): self
    {
        return new self(self::CUSTOMER_TYPE);
    }

    /**
     * @return Type
     */
    public static function supplier(): self
    {
        return new self(self::SUPPLIER_TYPE);
    }

    /**
     * @return Type
     */
    public static function both(): self
    {
        return new self(self::BOTH_TYPE);
    }
}