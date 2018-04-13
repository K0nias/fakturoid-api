<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Request\Subject\DeleteSubjectRequest;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class DeleteSubjectRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new DeleteSubjectRequest(new Id(1));

        $this->assertSame('subjects/1.json', $request->getUri());
    }
}