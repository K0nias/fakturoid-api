<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice\Filter;

use K0nias\FakturoidApi\Model\Invoice\Filter\Parameters;
use K0nias\FakturoidApi\Model\Invoice\Status;
use PHPUnit\Framework\TestCase;

class CommonParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $status = new Status('open');

        $parametersFilter = (new Parameters())
            ->status($status);

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('status', $processedParameters);

        $this->assertSame($status->getStatus(), $processedParameters['status']);
    }
}