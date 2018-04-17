<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Generator;

use K0nias\FakturoidApi\Http\Request\Generator\DeleteGeneratorRequest;
use K0nias\FakturoidApi\Model\Generator\Id;
use PHPUnit\Framework\TestCase;

class DeleteGeneratorRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new DeleteGeneratorRequest(new Id(1));

        $this->assertSame('generators/1.json', $request->getUri());
    }
}