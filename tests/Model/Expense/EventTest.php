<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Expense\Event;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{

    public function testInvalidStatus(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidOptionParameterException::class);

        new Event('invalid_event');
    }

    public function testFactoryMethods(): void
    {
        $this->assertSame(Event::pay()->getEvent(), Event::PAY_EVENT);
        $this->assertSame(Event::removePayment()->getEvent(), Event::REMOVE_PAYMENT_EVENT);
    }

    public function testPaidEventWithOptionaldata(): void
    {
        $event = Event::pay(new DateTimeImmutable('2018-02-02 00:00:00'));

        $this->assertSame(
            [
                'paid_at' => (new DateTime('2018-02-02 00:00:00'))->format(DateTime::ATOM),
            ],
            $event->getOptionalData()
        );
    }

}
