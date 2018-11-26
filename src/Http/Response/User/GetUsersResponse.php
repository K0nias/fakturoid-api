<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\User;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetUsersResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getUsers(): array
    {
        return $this->data;
    }

}
