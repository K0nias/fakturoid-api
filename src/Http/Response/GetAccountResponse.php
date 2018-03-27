<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

final class GetAccountResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getAccount(): array
    {
        return $this->data;
    }
}