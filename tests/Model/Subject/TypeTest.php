<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;
use K0nias\FakturoidApi\Model\Subject\Type;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidOptionParameterException::class);

        new Type('invalid_type');
    }

    public function testFactoryMethods()
    {
        $this->assertSame((Type::customer())->getType(), Type::CUSTOMER_TYPE);
        $this->assertSame((Type::supplier())->getType(), Type::SUPPLIER_TYPE);
        $this->assertSame((Type::both())->getType(), Type::BOTH_TYPE);
    }
}