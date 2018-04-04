<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Payment;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;
use K0nias\FakturoidApi\Model\Payment\Method;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidOptionParameterException::class);

        new Method('invalid_status');
    }

    public function testFactoryMethods()
    {
        $this->assertSame((Method::bank())->getMethod(), Method::BANK_METHOD);
        $this->assertSame((Method::cod())->getMethod(), Method::COD_METHOD);
        $this->assertSame((Method::cash())->getMethod(), Method::CASH_METHOD);
        $this->assertSame((Method::card())->getMethod(), Method::CARD_METHOD);
        $this->assertSame((Method::payPal())->getMethod(), Method::PAYPAL_METHOD);
    }
}