<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\Subject\CreateSubjectResponse;
use PHPUnit\Framework\TestCase;

class CreateSubjectResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new CreateSubjectResponse((string) json_encode([
            'id' => 1,
        ]));

        $this->assertSame(1, $response->getSubjectId()->getId());
    }

}
