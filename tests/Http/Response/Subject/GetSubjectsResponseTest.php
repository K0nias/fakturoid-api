<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\Subject\GetSubjectsResponse;
use PHPUnit\Framework\TestCase;

class GetSubjectsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetSubjectsResponse((string) json_encode([
            [
                'id' => 201,
                // ...
            ],
            [
                'id' => 202,
                // ...
            ],
        ]));

        $this->assertSame(
            [
                ['id' => 201],
                ['id' => 202],
            ],
            $response->getSubjects()
        );
    }

}
