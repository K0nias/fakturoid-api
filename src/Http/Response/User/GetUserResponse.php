<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\User;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetUserResponse extends CommonJsonResponse
{

    /**
     * @return mixed[]
     */
    public function getUser(): array
    {
        return $this->data;
    }

}
