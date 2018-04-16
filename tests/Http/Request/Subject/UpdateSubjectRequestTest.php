<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Request\Subject\UpdateSubjectRequest;
use K0nias\FakturoidApi\Model\Subject\Id;
use K0nias\FakturoidApi\Model\Subject\Parameters;
use PHPUnit\Framework\TestCase;

class UpdateSubjectRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new UpdateSubjectRequest(new Id(1), new Parameters());

        $this->assertSame('subjects/1.json', $request->getUri());
    }
}