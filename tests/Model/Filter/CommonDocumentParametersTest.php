<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;
use K0nias\FakturoidApi\Tests\Model\Filter\Mock\CommonDocumentParameterMock;
use K0nias\FakturoidApi\Tests\Model\Filter\Mock\CommonParameterMock;
use PHPUnit\Framework\TestCase;

class CommonDocumentParametersTest extends TestCase
{
    public function testParametersValues()
    {
        $subjectId = new Id(100);

        $parametersFilter = (new CommonDocumentParameterMock())
            ->subject($subjectId);

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('subject_id', $processedParameters);

        $this->assertSame($subjectId->getId(), $processedParameters['subject_id']);
    }
}