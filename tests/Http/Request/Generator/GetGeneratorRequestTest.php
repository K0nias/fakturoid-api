<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Generator;

use K0nias\FakturoidApi\Http\Request\Generator\GetGeneratorRequest;
use K0nias\FakturoidApi\Model\Generator\Id;
use PHPUnit\Framework\TestCase;

class GetGeneratorRequestTest extends TestCase
{

    public function testUri(): void
    {
        $request = new GetGeneratorRequest(new Id(1));

        $this->assertSame('generators/1.json', $request->getUri());
    }

}
