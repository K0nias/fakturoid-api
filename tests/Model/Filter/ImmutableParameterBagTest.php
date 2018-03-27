<?php

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Filter\ImmutableParameterBag;
use PHPUnit\Framework\TestCase;

class ImmutableParameterBagTest extends TestCase
{
    public function testTestImmutability()
    {
        $parameterBag = new ImmutableParameterBag();
        $parameterBag2 = $parameterBag->set('test', 1);

        $this->assertTrue($parameterBag !== $parameterBag2);
    }
}