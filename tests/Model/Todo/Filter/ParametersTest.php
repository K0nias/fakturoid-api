<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Todo\Filter;

use K0nias\FakturoidApi\Model\Todo\Filter\Parameters;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $sinceDate = new \DateTimeImmutable();
        $page = 1;

        $parametersFilter = (new Parameters())
            ->since($sinceDate)
            ->page($page);

        $this->assertEquals([
            'page' => $page,
            'since' => $sinceDate->format(\DateTime::ATOM),
        ], $parametersFilter->getParameters());
    }
}