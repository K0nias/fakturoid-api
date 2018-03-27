<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

final class GetUserResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getUser(): array
    {
        return $this->data;
    }
}