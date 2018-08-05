<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Invoice\OptionalParameters;
use PHPUnit\Framework\TestCase;

class OptionalParametersTest extends TestCase
{
    public function testInvalidDueParameter()
    {
        $parameters = new OptionalParameters();

        $this->expectException(InvalidParameterException::class);

        $parameters->due(0);
    }

    public function testParameters()
    {
        $parameters = new OptionalParameters();

        $parameters->due(5)
                    ->issuedDate(new \DateTimeImmutable('2018-04-04'))
                    ->variableNumber('variable-Number1');

        $this->assertSame(
            [
                'due' => 5,
                'issued_on' => '2018-04-04',
                'variable_symbol' => 'variable-Number1',
            ],
            $parameters->getParameters()
        );
    }
}
