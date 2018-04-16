<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Generator;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Generator\Periodic;
use PHPUnit\Framework\TestCase;

class PeriodicTest extends TestCase
{
    public function testInvalidStartDate()
    {
        $this->expectException(InvalidParameterException::class);

        $now = new \DateTimeImmutable();

        new Periodic($now->modify('-1 day'), 10);
    }

    public function testInvalidMonthsPeriod()
    {
        $this->expectException(InvalidParameterException::class);

        $now = new \DateTimeImmutable();

        new Periodic($now, -1);
    }

    public function testValidData()
    {
        $startDate = new \DateTimeImmutable();

        $endDate = new \DateTimeImmutable();
        $endDate->modify('+100 day');

        $nextOccurrenceDate = new \DateTimeImmutable();
        $nextOccurrenceDate->modify('+10 day');


        $periodic = new Periodic($startDate, 10);
        $periodic->endDate($endDate)
            ->nextOccurrenceDate($nextOccurrenceDate);

        $testingData = [
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'months_period' => 10,
            'next_occurrence_on' => $nextOccurrenceDate->format('Y-m-d')
        ];


        $this->assertEquals($testingData, $periodic->getParameters());
    }
}