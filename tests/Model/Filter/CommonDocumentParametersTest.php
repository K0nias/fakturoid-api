<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class CommonDocumentParametersTest extends TestCase
{
    public function testParametersValues()
    {
        $subject = new Id(1);
        $page = 1;
        $sinceDate = new \DateTimeImmutable();
        $updatedSinceDate = new \DateTimeImmutable();
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
            'since' => $sinceDate->format(\DateTime::ATOM),
            'updated_since' => $updatedSinceDate->format(\DateTime::ATOM),
            'number' => $number,
        ], $parametersFilter->getParameters());
    }
}