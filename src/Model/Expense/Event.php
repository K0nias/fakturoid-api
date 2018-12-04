<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use DateTime;
use DateTimeImmutable;

final class Event
{

    public const PAY_EVENT = 'pay';
    public const REMOVE_PAYMENT_EVENT = 'remove_payment';

    private const AVAILABLE_EVENTS = [
        self::PAY_EVENT,
        self::REMOVE_PAYMENT_EVENT,
    ];

    /** @var string */
    private $event;

    /** @var mixed[] */
    private $optionalData = [];

    public function __construct(string $event)
    {
        $event = strtolower($event);

        if ( ! in_array($event, self::AVAILABLE_EVENTS)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom(
                $event,
                self::AVAILABLE_EVENTS,
                'Invalid event. Given: "%s". Available events: "%s".'
            );
        }

        $this->event = $event;
    }

    /**
     * @return mixed[]
     */
    public function getOptionalData(): array
    {
        return $this->optionalData;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public static function pay(?DateTimeImmutable $payDate = null): self
    {
        $self = new self(self::PAY_EVENT);

        if ($payDate) {
            $self->optionalData['paid_at'] = $payDate->format(DateTime::ATOM);
        }

        return $self;
    }

    public static function removePayment(): self
    {
        return new self(self::REMOVE_PAYMENT_EVENT);
    }

}
