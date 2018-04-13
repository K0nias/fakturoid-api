<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Request\Subject\GetSubjectRequest;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class GetSubjectRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new GetSubjectRequest(new Id(1));

        $this->assertSame('subjects/1.json', $request->getUri());
    }
}