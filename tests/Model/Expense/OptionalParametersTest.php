<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense;

use K0nias\FakturoidApi\Model\Expense\OptionalParameters;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use PHPUnit\Framework\TestCase;

class OptionalParametersTest extends TestCase
{
    public function testParameters()
    {
        $parameters = new OptionalParameters();

        $parameters->paymentMethod(PaymentMethod::cash())
            ->number('2018-0001')
            ->originalNumber('2018-0001a')
            ->issuedDate(new \DateTimeImmutable('2018-04-04'));

        $this->assertEquals([
            'number' => '2018-0001',
            'original_number' => '2018-0001a',
            'issued_on' => '2018-04-04',
            'payment_method' => PaymentMethod::CASH_METHOD,
        ], $parameters->getParameters());
    }
}