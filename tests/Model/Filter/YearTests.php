<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Filter\Year;
use PHPUnit\Framework\TestCase;

class YearTests extends TestCase
{

    public function testYear(): void
    {
        $year = new Year(2015);

        $this->assertSame(2015, $year->getYear());
    }

}
