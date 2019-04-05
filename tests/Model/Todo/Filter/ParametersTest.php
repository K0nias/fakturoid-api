<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Todo\Filter;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Todo\Filter\Parameters;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    public function testParametersValue(): void
    {
        $sinceDate = new DateTimeImmutable();
        $page = 1;

        $parametersFilter = (new Parameters())
            ->since($sinceDate)
            ->page($page);

        $this->assertEquals([
            'page' => $page,
            'since' => $sinceDate->format(DateTime::ATOM),
        ], $parametersFilter->getParameters());
    }

    public function testInvalidPageValue(): void
    {
        $this->expectException(\OutOfRangeException::class);
        $this->expectExceptionMessage('Page must be positive integer. Given "0"');

        (new Parameters())->page(0);
    }

    public function testMinPageValue(): void
    {
        $this->assertNotNull((new Parameters())->page(1));
    }

}
