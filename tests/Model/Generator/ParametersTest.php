<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Generator;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Currency\Currency;
use K0nias\FakturoidApi\Model\Generator\Periodic;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Generator\Parameters;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    protected function createParameters()
    {
        $parameters = new Parameters();

        $parameters->due(10)
            ->name('test name')
            ->custom('1000a')
            ->currency(Currency::aud())
            ->due(10)
            ->proforma(true)
            ->paymentMethod(PaymentMethod::bank())
            ->subject(new SubjectId(10))
            ->lines(new Line('Work hour', 100, 1.0));

        return $parameters;
    }

    protected function getPeriodicParametersData()
    {
        $data = $this->getNotPeriodicParametersData();

        $data = array_merge($data, [
            'recurring' => true,
            'start_date' => (new \DateTime)->format('Y-m-d'),
            'months_period' => 10,
        ]);

        return $data;
    }

    protected function getNotPeriodicParametersData()
    {
        return [
            'name' => 'test name',
            'custom_id' => '1000a',
            'proforma' => true,
            'recurring' => false,
            'due' => 10,
            'subject_id' => 10,
            'payment_method' => PaymentMethod::BANK_METHOD,
            'currency' => Currency::AUD_CURRENCY,
            'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
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

    public function testNotPeriodicParameters()
    {
        $parameters = $this->createParameters();


        $testedData = $this->getNotPeriodicParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }

    public function testPeriodicParameters()
    {
        $periodic = new Periodic(new \DateTimeImmutable(), 10);

        $parameters = $this->createParameters();

        $parameters->periodical($periodic);


        $testedData = $this->getPeriodicParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }
}