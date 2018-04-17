<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Message;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Message\Message;

final class CreateMessageRequest implements RequestInterface
{

    const REQUEST_URI = 'invoices/%s/message.json';

    /**
     * @var Message
     */
    private $message;


    /**
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->message->getInvoiceId()->getId());
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
        return $this->message->getData();
    }
}