<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\DataValidator;

use K0nias\FakturoidApi\Model\DataValidator\MonthsPeriodValidator;
use PHPUnit\Framework\TestCase;

class MonthsPeriodValidatorTest extends TestCase
{

    public function testInvalidMonthsPeriod(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);
        $this->expectExceptionMessage('Months period must be positive integer greater than 0. Given: 0');

        MonthsPeriodValidator::validate(0);
    }

    public function testValidMonthsPeriod(): void
    {
        MonthsPeriodValidator::validate(1);

        $this->expectNotToPerformAssertions();
    }

}
