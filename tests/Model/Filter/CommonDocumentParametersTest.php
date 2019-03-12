<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class CommonDocumentParametersTest extends TestCase
{

    public function testParametersValues(): void
    {
        $subject = new Id(1);
        $page = 1;
        $sinceDate = new DateTimeImmutable();
        $updatedSinceDate = new DateTimeImmutable();
        $variableSymbol = '1111222';
        $number = '2018-0005';

        $parametersFilter = (new CommonDocumentParameters())
            ->subject($subject)
            ->page($page)
            ->since($sinceDate)
            ->updatedSince($updatedSinceDate)
            ->number($number);

        $this->assertEquals([
            'subject_id' => $subject->getId(),
            'page' => $page,
            'since' => $sinceDate->format(DateTime::ATOM),
            'updated_since' => $updatedSinceDate->format(DateTime::ATOM),
            'number' => $number,
        ], $parametersFilter->getParameters());
    }

    public function testInvalidPageValue(): void
    {
        $this->expectException(\OutOfRangeException::class);
        $this->expectExceptionMessage('Page must be positive integer. Given "0"');

        (new CommonDocumentParameters())->page(0);
    }

    public function testMinPageValue(): void
    {
        $this->assertNotNull((new CommonDocumentParameters())->page(1));
    }

}
