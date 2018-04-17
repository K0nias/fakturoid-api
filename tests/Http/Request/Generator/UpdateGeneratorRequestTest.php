<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Generator;

use K0nias\FakturoidApi\Http\Request\Generator\UpdateGeneratorRequest;
use K0nias\FakturoidApi\Model\Generator\Id;
use K0nias\FakturoidApi\Model\Generator\Parameters;
use PHPUnit\Framework\TestCase;

class UpdateGeneratorRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new UpdateGeneratorRequest(new Id(1), new Parameters());

        $this->assertSame('generators/1.json', $request->getUri());
    }
}