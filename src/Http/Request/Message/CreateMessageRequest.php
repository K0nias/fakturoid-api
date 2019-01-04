<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Message;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Message\CreateMessageResponse;
use K0nias\FakturoidApi\Model\Message\Message;

final class CreateMessageRequest implements RequestInterface
{

    private const REQUEST_URI = 'invoices/%s/message.json';

    /** @var \K0nias\FakturoidApi\Model\Message\Message */
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->message->getInvoiceId()->getId());
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
        return $this->message->getData();
    }

    public function send(Api $api): CreateMessageResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Message\CreateMessageResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
