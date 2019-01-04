<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Expense\FireExpenseEventResponse;
use K0nias\FakturoidApi\Model\Expense\Event;
use K0nias\FakturoidApi\Model\Expense\Id;

final class FireExpenseEventRequest implements RequestInterface
{

    private const REQUEST_URI = 'expenses/%s/fire.json?event=%s';

    /** @var \K0nias\FakturoidApi\Model\Expense\Event */
    private $event;

    /** @var \K0nias\FakturoidApi\Model\Expense\Id */
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

    public function send(Api $api): FireExpenseEventResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Expense\FireExpenseEventResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
