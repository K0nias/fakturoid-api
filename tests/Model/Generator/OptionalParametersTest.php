<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Generator;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Generator\OptionalParameters;
use K0nias\FakturoidApi\Model\Generator\Periodic;
use PHPUnit\Framework\TestCase;

class OptionalParametersTest extends TestCase
{

    public function testInvalidDueParameter(): void
    {
        $parameters = new OptionalParameters();

        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidParameterException::class);

        $parameters->due(0);
    }

    public function testParameters(): void
    {
        $parameters = new OptionalParameters();

        $periodic = new Periodic(new DateTimeImmutable(), 10);

        $parameters->due(5)
            ->custom('222')
            ->proforma(true)
            ->periodical($periodic);

        $testingData = [
            'due' => 5,
            'recurring' => true,
            'start_date' => (new DateTime())->format('Y-m-d'),
            'months_period' => 10,
            'proforma' => true,
            'custom_id' => '222',
        ];

        $this->assertEquals($testingData, $parameters->getParameters());
    }

}
