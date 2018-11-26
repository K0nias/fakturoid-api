<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

final class Type
{

    public const CUSTOMER_TYPE = 'customer';
    public const SUPPLIER_TYPE = 'supplier';
    public const BOTH_TYPE = 'both';

    private const AVAILABLE_TYPES = [
        self::CUSTOMER_TYPE,
        self::SUPPLIER_TYPE,
        self::BOTH_TYPE,
    ];

    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $type = strtolower($type);

        if ( ! in_array($type, self::AVAILABLE_TYPES)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom($type, self::AVAILABLE_TYPES, 'Invalid type. Given: "%s". Available types: "%s".');
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Subject\Type
     */
    public static function customer(): self
    {
        return new self(self::CUSTOMER_TYPE);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Subject\Type
     */
    public static function supplier(): self
    {
        return new self(self::SUPPLIER_TYPE);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Subject\Type
     */
    public static function both(): self
    {
        return new self(self::BOTH_TYPE);
    }

}
