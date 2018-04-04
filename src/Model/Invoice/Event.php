<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;

final class Event
{
    const MARK_AS_SENT_EVENT = 'mark_as_sent';
    const DELIVER_EVENT = 'deliver';
    const PAY_EVENT = 'pay';
    const PAY_PROFORMA_EVENT = 'pay_proforma';
    const PAY_PARTIAL_PROFORMA_EVENT = 'pay_partial_proforma';
    const REMOVE_PAYMENT_EVENT = 'remove_payment';
    const DELIVER_REMINDER_EVENT = 'deliver_reminder';
    const CANCEL_EVENT = 'cancel';
    const UNDO_CANCEL_EVENT = 'undo_cancel';

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
    public static function markAsSent(): self
    {
        return new self(self::MARK_AS_SENT_EVENT);
    }

    /**
     * @return self
     */
    public static function deliver(): self
    {
        return new self(self::DELIVER_EVENT);
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
    public static function payProforma(): self
    {
        return new self(self::PAY_PROFORMA_EVENT);
    }

    /**
     * @return self
     */
    public static function payPartialProforma(): self
    {
        return new self(self::PAY_PARTIAL_PROFORMA_EVENT);
    }

    /**
     * @return self
     */
    public static function removePayment(): self
    {
        return new self(self::REMOVE_PAYMENT_EVENT);
    }

    /**
     * @return self
     */
    public static function deliverReminder(): self
    {
        return new self(self::DELIVER_REMINDER_EVENT);
    }

    /**
     * @return self
     */
    public static function cancel(): self
    {
        return new self(self::CANCEL_EVENT);
    }

    /**
     * @return self
     */
    public static function undoCancel(): self
    {
        return new self(self::UNDO_CANCEL_EVENT);
    }
}