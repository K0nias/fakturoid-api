<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Event\Filter;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Event\Filter\Parameters;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    public function testParametersValue(): void
    {
        $sinceDate = new DateTimeImmutable();
        $subject = new Id(1);
        $page = 1;

        $parametersFilter = (new Parameters())
            ->since($sinceDate)
            ->page($page)
            ->subject($subject);

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('page', $processedParameters);
        $this->assertArrayHasKey('since', $processedParameters);
        $this->assertArrayHasKey('subject_id', $processedParameters);

        $this->assertSame($page, $processedParameters['page']);
        $this->assertSame($sinceDate->format(DateTime::ATOM), $processedParameters['since']);
        $this->assertSame($subject->getId(), $processedParameters['subject_id']);
    }

}
