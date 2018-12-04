<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Todo;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetTodosResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getTodos(): array
    {
        return $this->data;
    }

}
