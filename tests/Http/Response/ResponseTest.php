<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response;

use K0nias\FakturoidApi\Http\Response\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new Response(200, 'content string');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('content string', $response->getContent());
    }

}
