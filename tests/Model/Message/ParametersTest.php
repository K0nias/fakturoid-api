<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Message;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Message\Parameters;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    public function getFullParametersData()
    {
        return [
            'email' => 'email@example.com',
            'email_copy' => 'email2@example.com',
            'subject' => 'subject',
            'message' => 'message content',
        ];
    }

    public function testInvalidEmailParameter()
    {
        $parameters = new Parameters();

        $this->expectException(InvalidParameterException::class);

        $parameters->email('invalid_email');
    }

    public function testInvalidEmailCopyParameter()
    {
        $parameters = new Parameters();

        $this->expectException(InvalidParameterException::class);

        $parameters->emailCopy('invalid_email');
    }

    public function testParameters()
    {
        $parameters = new Parameters();

        $parameters->email('email@example.com')
            ->emailCopy('email2@example.com')
            ->subject('subject')
            ->message('message content');


        $testedData = $this->getFullParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }
}