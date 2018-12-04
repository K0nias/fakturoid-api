<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Expense\Parameters;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    /** @return mixed[] */
    public function getFullParametersData(): array
    {
        return [
            'subject_id' => 10,
            'number' => '2018-0001',
            'payment_method' => PaymentMethod::BANK_METHOD,
            'lines' => [
                [
                    'name' => 'Work hour',
                    'unit_price' => 100,
                    'quantity' => 1.0,
                ],
            ],
            'issued_on' => (new DateTime())->format('Y-m-d'),
        ];
    }

    public function testDueDateInPast(): void
    {
        $parameters = new Parameters();

        $dueDate = new DateTimeImmutable();
        $dueDate = $dueDate->modify('-1 day');

        $parameters->dueDate($dueDate);

        $testedData = [
            'due_on' => $dueDate->format('Y-m-d'),
            'issued_on' => $dueDate->format('Y-m-d'),
        ];

        $this->assertEquals($testedData, $parameters->getParameters());
    }


    public function testInvalidLines(): void
    {
        $parameters = new Parameters();

        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        $parameters->lines('aa');
    }

    public function testValidLines(): void
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

    public function testParameters(): void
    {
        $parameters = new Parameters();

        $parameters
            ->number('2018-0001')
            ->paymentMethod(PaymentMethod::bank())
            ->subject(new SubjectId(10))
            ->lines(new Line('Work hour', 100, 1.0))
            ->issuedDate(new DateTimeImmutable());

        $testedData = $this->getFullParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }

}
