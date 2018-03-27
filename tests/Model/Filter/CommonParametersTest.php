<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;
use K0nias\FakturoidApi\Tests\Model\Filter\Mock\CommonParameterMock;
use PHPUnit\Framework\TestCase;

class CommonParametersTest extends TestCase
{
    public function testInvalidPageParameter()
    {
        $parametersFilter = new CommonParameterMock();

        $this->expectException(\OutOfRangeException::class);

        $parametersFilter->page(-1);
    }

    public function testParametersValues()
    {
        $custom = 'test_id';
        $page = 2;
        $sinceDate = new \DateTimeImmutable('2018-03-27 10:25:30');
        $subjectId = new Id(100);

        $parametersFilter = (new CommonParameterMock())
            ->custom($custom)
            ->page($page)
            ->since($sinceDate)
            ->subject($subjectId);

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('page', $processedParameters);
        $this->assertArrayHasKey('since', $processedParameters);
        $this->assertArrayHasKey('custom_id', $processedParameters);
        $this->assertArrayHasKey('subject_id', $processedParameters);

        $this->assertSame($page, $processedParameters['page']);
        $this->assertSame($sinceDate->format(\DateTime::ATOM), $processedParameters['since']);
        $this->assertSame($custom, $processedParameters['custom_id']);
        $this->assertSame($subjectId->getId(), $processedParameters['subject_id']);
    }
}