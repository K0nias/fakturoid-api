<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Parameters;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use PHPUnit\Framework\TestCase;

class ImmutableParameterBagTest extends TestCase
{

    public function testTestImmutability(): void
    {
        $parameterBag = new ImmutableParameterBag();
        $parameterBag2 = $parameterBag->set('test', 1);

        $this->assertTrue($parameterBag !== $parameterBag2);
    }

    public function testGetSingleParameter(): void
    {
        $parameterBag = new ImmutableParameterBag();
        $parameterBag = $parameterBag->set('key', 1);

        $this->assertEquals(1, $parameterBag->get('key'));
    }

    public function testExistingParameterKey(): void
    {
        $parameterBag = new ImmutableParameterBag();
        $parameterBag = $parameterBag->set('key', 1);

        $this->assertEquals(1, $parameterBag->get('key'));
    }

    public function testNotExistingParameterKey(): void
    {
        $parameterBag = new ImmutableParameterBag();

        $this->expectException(\OutOfBoundsException::class);

        $parameterBag->get('not_existing_parameter_key');
    }

}
