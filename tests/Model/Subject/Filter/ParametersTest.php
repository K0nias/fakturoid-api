<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject\Filter;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Subject\Filter\Parameters;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    public function testParametersValue(): void
    {
        $sinceDate = new DateTimeImmutable();
        $updateSinceDate = new DateTimeImmutable();
        $custom = '12';
        $page = 1;

        $parametersFilter = (new Parameters())
            ->since($sinceDate)
            ->updatedSince($updateSinceDate)
            ->page($page)
            ->custom($custom);

        $this->assertEquals([
            'custom_id' => $custom,
            'page' => $page,
            'since' => $sinceDate->format(DateTime::ATOM),
            'updated_since' => $updateSinceDate->format(DateTime::ATOM),
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
