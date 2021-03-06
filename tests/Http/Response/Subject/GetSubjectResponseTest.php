<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\Subject\GetSubjectResponse;
use PHPUnit\Framework\TestCase;

class GetSubjectResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetSubjectResponse((string) json_encode([
            'id' => 1,
            // ...
        ]));

        $this->assertSame(['id' => 1], $response->getSubject());
    }

}
