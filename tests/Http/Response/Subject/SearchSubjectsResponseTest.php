<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\Subject\SearchSubjectsResponse;
use PHPUnit\Framework\TestCase;

class SearchSubjectsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new SearchSubjectsResponse((string) json_encode([
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
