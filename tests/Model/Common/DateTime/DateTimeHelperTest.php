<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Common\DateTime;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Common\DateTime\DateTimeHelper;
use K0nias\FakturoidApi\Model\Common\DateTime\DateTimeImmutableFactoryInterface;
use PHPUnit\Framework\TestCase;

class DateTimeHelperTest extends TestCase
{

    /**
     * @dataProvider dateInPastDataProvider
     */
    public function testDateInPast(DateTimeImmutable $actualDate, DateTimeImmutable $comporedDate, bool $shouldBeInPast): void
    {
        $dateTimeFactoryMock = $this->createMock(DateTimeImmutableFactoryInterface::class);
        $dateTimeFactoryMock->method('now')
            ->willReturn($actualDate);

        $dateTimeHelper = new DateTimeHelper($dateTimeFactoryMock);

        $this->assertSame($shouldBeInPast, $dateTimeHelper->isDateInPast($comporedDate));
    }

    /**
     * @return mixed[]
     */
    public function dateInPastDataProvider(): array
    {
        return [
            [new DateTimeImmutable('2019-01-02 10:00:00'), new DateTimeImmutable('2019-01-01 10:00:00'), true],
            [new DateTimeImmutable('2019-01-01 10:00:00'), new DateTimeImmutable('2019-01-01 10:00:00'), false],
        ];
    }

}
