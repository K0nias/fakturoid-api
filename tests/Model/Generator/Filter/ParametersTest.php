<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Generator\Filter;

use K0nias\FakturoidApi\Model\Generator\Filter\Parameters;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $sinceDate = new \DateTimeImmutable();
        $updateSinceDate = new \DateTimeImmutable();
        $subject = new Id(1);
        $page = 1;

        $parametersFilter = (new Parameters())
            ->since($sinceDate)
            ->updatedSince($updateSinceDate)
            ->page($page)
            ->subject($subject);

        $this->assertEquals([
            'subject_id' => $subject->getId(),
            'page' => $page,
            'since' => $sinceDate->format(\DateTime::ATOM),
            'updated_since' => $updateSinceDate->format(\DateTime::ATOM),
        ], $parametersFilter->getParameters());
    }
}