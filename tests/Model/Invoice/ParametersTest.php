<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Invoice\Parameters;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    public function getFullParametersData()
    {
        return [
            'subject_id' => 10,
            'number' => '2018-0001',
            'payment_method' => PaymentMethod::BANK_METHOD,
            'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
            'due' => 10,
            'issued_on' => (new \DateTime('2018-04-04'))->format('Y-m-d'),
        ];
    }

    public function testInvalidDueParameter()
    {
        $parameters = new Parameters();

        $this->expectException(InvalidParameterException::class);

        $parameters->due(0);
    }

    public function testInvalidLines()
    {
        $parameters = new Parameters();

        $this->expectException(InvalidParameterException::class);

        $parameters->lines('aa');
    }

    public function testValidLines()
    {
        $parameters = new Parameters();

        // via single line instance
        $parameters->lines(new Line('Work hour', 100, 1.0));

        $lines = [[
            'name' => 'Work hour',
            'unit_price' => 100,
            'quantity' => 1.0,
        ]];

        $this->assertEquals($lines, $parameters->getParameters()['lines']);

        // via line collection
        $parameters->lines(new LineCollection([new Line('Work hour', 100, 1.0)]));

        $this->assertEquals($lines, $parameters->getParameters()['lines']);
    }

    public function testParameters()
    {
        $parameters = new Parameters();

        $parameters->due(10)
            ->number('2018-0001')
            ->paymentMethod(PaymentMethod::bank())
            ->subject(new SubjectId(10))
            ->lines(new Line('Work hour', 100, 1.0))
            ->issuedDate(new \DateTimeImmutable('2018-04-04'));


        $testedData = $this->getFullParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }
}