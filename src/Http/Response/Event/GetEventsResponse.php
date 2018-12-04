<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Event;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetEventsResponse extends CommonJsonResponse
{

    /**
     * @return mixed[]
     */
    public function getEvents(): array
    {
        return $this->data;
    }

}
