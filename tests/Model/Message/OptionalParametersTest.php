<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Message;

use K0nias\FakturoidApi\Model\Message\OptionalParameters;
use PHPUnit\Framework\TestCase;

class OptionalParametersTest extends TestCase
{
    public function testParameters()
    {
        $parameters = new OptionalParameters();

        $parameters->email('email@example.com')
            ->emailCopy('email2@example.com')
            ->subject('subject')
            ->message('message content');

        $testingData = [
            'email' => 'email@example.com',
            'email_copy' => 'email2@example.com',
            'subject' => 'subject',
            'message' => 'message content',
        ];

        $this->assertEquals($testingData, $parameters->getParameters());
    }
}