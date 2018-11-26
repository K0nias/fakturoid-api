<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Request\Expense\FireExpenseEventRequest;
use K0nias\FakturoidApi\Model\Expense\Event;
use K0nias\FakturoidApi\Model\Expense\Id;
use PHPUnit\Framework\TestCase;

class FireExpenseEventRequestTest extends TestCase
{

    public function testUri(): void
    {
        $request = new FireExpenseEventRequest(new Id(1), Event::pay());

        $this->assertSame('expenses/1/fire.json?event=pay', $request->getUri());
    }

}
