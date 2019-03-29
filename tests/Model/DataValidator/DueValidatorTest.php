<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\DataValidator;

use K0nias\FakturoidApi\Model\DataValidator\DueValidator;
use PHPUnit\Framework\TestCase;

class DueValidatorTest extends TestCase
{

    public function testInvalidDue(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);
        $this->expectExceptionMessage('Due must be positive integer greater than 0. Given: 0');

        DueValidator::validate(0);
    }

    public function testValidDue(): void
    {
        DueValidator::validate(1);

        $this->expectNotToPerformAssertions();
    }

}
