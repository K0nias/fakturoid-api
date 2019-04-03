<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Event;

use K0nias\FakturoidApi\Http\Response\Event\GetEventsResponse;
use PHPUnit\Framework\TestCase;

class GetEventsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetEventsResponse((string) json_encode([
            [
                'name' => 'paid',
                // ...
            ],
            [
                'name' => 'payment_removed',
                // ...
            ],
        ]));

        $this->assertSame(
            [
                ['name' => 'paid'],
                ['name' => 'payment_removed'],
            ],
            $response->getEvents()
        );
    }

}
