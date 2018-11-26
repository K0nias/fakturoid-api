<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Line;

use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use PHPUnit\Framework\TestCase;

class LineCollectionTest extends TestCase
{

    public function testEmptyLineArray(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        new LineCollection();
    }

    public function testData(): void
    {
        $line = new Line('name', 1, 1, 'ks', 21);

        $collection = new LineCollection([$line]);

        $this->assertSame(
            [$line],
            $collection->getAll()
        );
    }

}
