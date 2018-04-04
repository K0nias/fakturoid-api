<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Exception\FilterParameter\InvalidStatusException;

final class Status
{
    const STATUS_OPEN = 'open';
    const STATUS_SENT = 'sent';
    const STATUS_OVERDUE = 'overdue';
    const STATUS_PAID = 'paid';
    const STATUS_CANCELLED = 'cancelled';

    private const AVAILABLE_STATUES = [
        self::STATUS_OPEN,
        self::STATUS_SENT,
        self::STATUS_OVERDUE,
        self::STATUS_PAID,
        self::STATUS_CANCELLED,
    ];

    /**
     * @var string
     */
    private $status;


    /**
     * @throws InvalidStatusException
     *
     * @param string $status
     */
    public function __construct(string $status)
    {
        $status = strtolower($status);

        if ( ! in_array($status, self::AVAILABLE_STATUES)) {
            throw InvalidStatusException::create($status, self::AVAILABLE_STATUES);
        }

        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return Status
     */
    public static function open(): self
    {
        return new self(self::STATUS_OPEN);
    }

    /**
     * @return Status
     */
    public static function sent(): self
    {
        return new self(self::STATUS_SENT);
    }

    /**
     * @return Status
     */
    public static function overdue(): self
    {
        return new self(self::STATUS_OVERDUE);
    }

    /**
     * @return Status
     */
    public static function paid(): self
    {
        return new self(self::STATUS_PAID);
    }

    /**
     * @return Status
     */
    public static function cancelled(): self
    {
        return new self(self::STATUS_CANCELLED);
    }

}