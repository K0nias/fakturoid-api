<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Line;

use K0nias\FakturoidApi\Model\Line\Line;
use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{

    public function testInvalidUnitPrice(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        new Line('name', -1, 1);
    }

    public function testInvalidQuantity(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        new Line('name', 1, 0);
    }

    public function testInvalidVatRate(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        new Line('name', 1, 1, 'ks', 0);
    }

    public function testCompleteData(): void
    {
        $line = new Line('name', 1, 1, 'ks', 21);

        $this->assertEquals([
            'name' => 'name',
            'unit_price' => 1.0,
            'quantity' => 1.0,
            'unit_name' => 'ks',
            'vat_rate' => 21.0,
        ], $line->getData());
    }

}
