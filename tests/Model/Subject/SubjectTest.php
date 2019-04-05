<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject;

use K0nias\FakturoidApi\Model\Subject\OptionalParameters;
use K0nias\FakturoidApi\Model\Subject\Subject;
use PHPUnit\Framework\TestCase;

class SubjectTest extends TestCase
{

    public function testMinimalData(): void
    {
        $subject = new Subject('Subject name');

        $this->assertSame(
            [
                'name' => 'Subject name',
            ],
            $subject->getData()
        );
    }

    public function testSubjectWithOptionalData(): void
    {
        $optionalParameters = new OptionalParameters();
        $optionalParameters->custom('2');

        $subject = new Subject('Subject name', $optionalParameters);

        $this->assertEquals(
            [
                'name' => 'Subject name',
                'custom_id' => '2',
            ],
            $subject->getData()
        );
    }

}
