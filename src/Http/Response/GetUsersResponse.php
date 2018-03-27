<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

final class GetUsersResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->data;
    }
}