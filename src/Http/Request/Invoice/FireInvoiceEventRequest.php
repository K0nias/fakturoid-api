<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Invoice\Event;
use K0nias\FakturoidApi\Model\Invoice\Id;

final class FireInvoiceEventRequest implements RequestInterface
{

    private const REQUEST_URI = 'invoices/%s/fire.json?event=%s';

    /** @var \K0nias\FakturoidApi\Model\Invoice\Event */
    private $event;

    /** @var \K0nias\FakturoidApi\Model\Invoice\Id */
    private $id;

    public function __construct(Id $id, Event $event)
    {
        $this->event = $event;
        $this->id = $id;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId(), $this->event->getEvent());
    }

    public function getMethod(): Method
    {
        return Method::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->event->getOptionalData();
    }

}
