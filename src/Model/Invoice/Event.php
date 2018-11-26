<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use DateTime;
use DateTimeImmutable;

final class Event
{

    public const MARK_AS_SENT_EVENT = 'mark_as_sent';
    public const DELIVER_EVENT = 'deliver';
    public const PAY_EVENT = 'pay';
    public const PAY_PROFORMA_EVENT = 'pay_proforma';
    public const PAY_PARTIAL_PROFORMA_EVENT = 'pay_partial_proforma';
    public const REMOVE_PAYMENT_EVENT = 'remove_payment';
    public const DELIVER_REMINDER_EVENT = 'deliver_reminder';
    public const CANCEL_EVENT = 'cancel';
    public const UNDO_CANCEL_EVENT = 'undo_cancel';

    private const AVAILABLE_EVENTS = [
        self::MARK_AS_SENT_EVENT,
        self::DELIVER_EVENT,
        self::PAY_EVENT,
        self::PAY_PROFORMA_EVENT,
        self::PAY_PARTIAL_PROFORMA_EVENT,
        self::REMOVE_PAYMENT_EVENT,
        self::DELIVER_REMINDER_EVENT,
        self::CANCEL_EVENT,
        self::UNDO_CANCEL_EVENT,
    ];

    /** @var string */
    private $event;

    /** @var mixed[] */
    private $optionalData = [];

    public function __construct(string $event)
    {
        $event = strtolower($event);

        if ( ! in_array($event, self::AVAILABLE_EVENTS)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom($event, self::AVAILABLE_EVENTS, 'Invalid event. Given: "%s". Available events: "%s".');
        }

        $this->event = $event;
    }

    /** @return mixed[] */
    public function getOptionalData(): array
    {
        return $this->optionalData;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public static function markAsSent(): self
    {
        return new self(self::MARK_AS_SENT_EVENT);
    }

    public static function deliver(): self
    {
        return new self(self::DELIVER_EVENT);
    }

    public static function pay(?DateTimeImmutable $payDate = null, ?float $ammount = null): self
    {
        $self = new self(self::PAY_EVENT);

        if ($payDate !== null) {
            $self->optionalData['paid_at'] = $payDate->format(DateTime::ATOM);
        }

        if ($ammount !== null) {
            $self->optionalData['paid_amount'] = $ammount;
        }

        return $self;
    }

    public static function payProforma(): self
    {
        return new self(self::PAY_PROFORMA_EVENT);
    }

    public static function payPartialProforma(): self
    {
        return new self(self::PAY_PARTIAL_PROFORMA_EVENT);
    }

    public static function removePayment(): self
    {
        return new self(self::REMOVE_PAYMENT_EVENT);
    }

    public static function deliverReminder(): self
    {
        return new self(self::DELIVER_REMINDER_EVENT);
    }

    public static function cancel(): self
    {
        return new self(self::CANCEL_EVENT);
    }

    public static function undoCancel(): self
    {
        return new self(self::UNDO_CANCEL_EVENT);
    }

}
