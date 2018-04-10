<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Request\Expense\FireExpenseEventRequest;
use K0nias\FakturoidApi\Model\Expense\Id;
use K0nias\FakturoidApi\Model\Expense\Event;
use PHPUnit\Framework\TestCase;

class FireExpenseEventResponseTest extends TestCase
{
    public function testUri()
    {
        $request = new FireExpenseEventRequest(new Id(1), Event::pay());

        $this->assertSame('expenses/1/fire.json?event=pay', $request->getUri());
    }
}