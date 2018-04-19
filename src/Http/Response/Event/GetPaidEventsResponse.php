<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Event;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetPaidEventsResponse extends CommonJsonResponse
{
    public function getEvents(): array
    {
        return $this->data;
    }
}