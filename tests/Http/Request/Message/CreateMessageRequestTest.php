<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Message;

use K0nias\FakturoidApi\Http\Request\Message\CreateMessageRequest;
use K0nias\FakturoidApi\Model\Invoice\Id;
use K0nias\FakturoidApi\Model\Message\Message;
use PHPUnit\Framework\TestCase;

class CreateMessageRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new CreateMessageRequest(new Message(new Id(1)));

        $this->assertSame('invoices/1/message.json', $request->getUri());
    }
}