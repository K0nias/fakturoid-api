<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense\Filter;

use K0nias\FakturoidApi\Model\Expense\Filter\Parameters;
use K0nias\FakturoidApi\Model\Expense\Status;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $parametersFilter = (new Parameters())
            ->status(Status::open());

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('status', $processedParameters);

        $this->assertSame((Status::open())->getStatus(), $processedParameters['status']);
    }
}