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
     * @var array
     */
    private $optionalData = [];


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

    public function getOptionalData(): array
    {
        return $this->optionalData;
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
    public static function pay(?\DateTimeImmutable $payDate = null): self
    {
        $self = new self(self::PAY_EVENT);

        if ($payDate) {
            $self->optionalData['paid_at'] = $payDate->format(\DateTime::ATOM);
        }

        return $self;
    }

    /**
     * @return self
     */
    public static function removePayment(): self
    {
        return new self(self::REMOVE_PAYMENT_EVENT);
    }
}