<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;
use K0nias\FakturoidApi\Model\Invoice\Event;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidOptionParameterException::class);

        new Event('invalid_event');
    }

    public function testFactoryMethods()
    {
        $this->assertSame((Event::markAsSent())->getEvent(), Event::MARK_AS_SENT_EVENT);
        $this->assertSame((Event::deliver())->getEvent(), Event::DELIVER_EVENT);
        $this->assertSame((Event::pay())->getEvent(), Event::PAY_EVENT);
        $this->assertSame((Event::payProforma())->getEvent(), Event::PAY_PROFORMA_EVENT);
        $this->assertSame((Event::payPartialProforma())->getEvent(), Event::PAY_PARTIAL_PROFORMA_EVENT);
        $this->assertSame((Event::removePayment())->getEvent(), Event::REMOVE_PAYMENT_EVENT);
        $this->assertSame((Event::deliverReminder())->getEvent(), Event::DELIVER_REMINDER_EVENT);
        $this->assertSame((Event::cancel())->getEvent(), Event::CANCEL_EVENT);
        $this->assertSame((Event::undoCancel())->getEvent(), Event::UNDO_CANCEL_EVENT);
    }
}