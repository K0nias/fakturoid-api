<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;

final class Event
{
    const PAY_EVENT = 'pay';
    const REMOVE_PAYMENT_EVENT = 'remove_payment';

    private const AVAILABLE_EVENTS = [
        self::PAY_EVENT,
        self::REMOVE_PAYMENT_EVENT,
    ];

    /**
     * @var string
     */
    private $event;


    /**
     * @throws InvalidOptionParameterException
     *
     * @param string $event
     */
    public function __construct(string $event)
    {
        $event = strtolower($event);

        if ( ! in_array($event, self::AVAILABLE_EVENTS)) {
            throw InvalidOptionParameterException::createFrom($event, self::AVAILABLE_EVENTS, 'Invalid event. Given: "%s". Available events: "%s".');
        }

        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return self
     */
    public static function pay(): self
    {
        return new self(self::PAY_EVENT);
    }

    /**
     * @return self
     */
    public static function removePayment(): self
    {
        return new self(self::REMOVE_PAYMENT_EVENT);
    }
}