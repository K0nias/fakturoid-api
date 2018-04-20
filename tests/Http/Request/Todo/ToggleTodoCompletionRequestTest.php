<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Request\Invoice;

use K0nias\FakturoidApi\Http\Request\Todo\ToggleTodoCompletionRequest;
use K0nias\FakturoidApi\Model\Todo\Id;
use PHPUnit\Framework\TestCase;

class ToggleTodoCompletionRequestTest extends TestCase
{
    public function testUri()
    {
        $request = new ToggleTodoCompletionRequest(new Id(15));

        $this->assertSame('todos/15/toggle_completion.json', $request->getUri());
    }
}