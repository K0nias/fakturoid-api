<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Request\Expense\SearchExpensesRequest;
use K0nias\FakturoidApi\Model\Filter\SearchParameters;
use PHPUnit\Framework\TestCase;

class SearchExpensesRequestTest extends TestCase
{

    public function testParameters(): void
    {
        $query = 'query';
        $page = 2;

        $parameters = (new SearchParameters())
            ->query($query)
            ->page($page);

        $request = new SearchExpensesRequest($parameters);

        $data = $request->getData();

        $this->assertNotEmpty($data);

        $this->assertArrayHasKey('query', $data);
        $this->assertArrayHasKey('page', $data);

        $this->assertSame($page, $data['page']);
        $this->assertSame($query, $data['query']);
    }

}
