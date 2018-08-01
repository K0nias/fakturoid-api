<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject\Filter;

use K0nias\FakturoidApi\Model\Subject\Filter\Parameters;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $sinceDate = new \DateTimeImmutable();
        $updateSinceDate = new \DateTimeImmutable();
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
            'since' => $sinceDate->format(\DateTime::ATOM),
            'updated_since' => $updateSinceDate->format(\DateTime::ATOM),
        ], $parametersFilter->getParameters());
    }
}