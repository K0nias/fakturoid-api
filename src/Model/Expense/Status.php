<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

final class Status
{

    public const STATUS_OPEN = 'open';
    public const STATUS_OVERDUE = 'overdue';
    public const STATUS_PAID = 'paid';

    private const AVAILABLE_STATUES = [
        self::STATUS_OPEN,
        self::STATUS_OVERDUE,
        self::STATUS_PAID,
    ];

    /** @var string */
    private $status;

    public function __construct(string $status)
    {
        $status = strtolower($status);

        if ( ! in_array($status, self::AVAILABLE_STATUES)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom($status, self::AVAILABLE_STATUES);
        }

        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Expense\Status
     */
    public static function open(): self
    {
        return new self(self::STATUS_OPEN);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Expense\Status
     */
    public static function overdue(): self
    {
        return new self(self::STATUS_OVERDUE);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Expense\Status
     */
    public static function paid(): self
    {
        return new self(self::STATUS_PAID);
    }

}
