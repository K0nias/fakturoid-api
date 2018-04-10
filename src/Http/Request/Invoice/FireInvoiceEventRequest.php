<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Invoice\Event;
use K0nias\FakturoidApi\Model\Invoice\Id;

final class FireInvoiceEventRequest implements RequestInterface
{
    const REQUEST_URI = 'invoices/%s/fire.json?event=%s';

    /**
     * @var Event
     */
    private $event;
    /**
     * @var Id
     */
    private $id;

    /**
     * @param Id    $id
     * @param Event $event
     */
    public function __construct(Id $id, Event $event)
    {
        $this->event = $event;
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId(), $this->event->getEvent());
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): Method
    {
        return Method::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }
}