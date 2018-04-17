<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Message;

use K0nias\FakturoidApi\Model\Invoice\Id;
use K0nias\FakturoidApi\Model\Message\Message;
use K0nias\FakturoidApi\Model\Message\OptionalParameters;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{

    protected function getTestingData()
    {
        return [
            'email' => 'email@example.com',
            'email_copy' => 'email2@example.com',
            'subject' => 'subject',
            'message' => 'message content',
        ];
    }

    public function createMessage()
    {
        $optionalParameters = new OptionalParameters();

        $optionalParameters->email('email@example.com')
            ->emailCopy('email2@example.com')
            ->subject('subject')
            ->message('message content');

        return new Message(new Id(1), $optionalParameters);
    }

    public function testMessageData()
    {
        $message = $this->createMessage();

        $this->assertEquals($this->getTestingData(), $message->getData());
    }
}