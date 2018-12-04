<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Filter;

use K0nias\FakturoidApi\Model\Filter\SearchParameters;
use PHPUnit\Framework\TestCase;

class SearchParametersTest extends TestCase
{

    public function testInvalidPageParameter(): void
    {
        $parametersFilter = new SearchParameters();

        $this->expectException(\OutOfRangeException::class);

        $parametersFilter->page(-1);
    }

    public function testParametersValues(): void
    {
        $query = 'query';
        $page = 2;

        $parametersFilter = (new SearchParameters())
            ->page($page)
            ->query($query);

        $processedParameters = $parametersFilter->getParameters();

        $this->assertArrayHasKey('page', $processedParameters);
        $this->assertArrayHasKey('query', $processedParameters);

        $this->assertSame($page, $processedParameters['page']);
        $this->assertSame($query, $processedParameters['query']);
    }

}
