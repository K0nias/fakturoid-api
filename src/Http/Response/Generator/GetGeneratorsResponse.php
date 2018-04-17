<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetGeneratorsResponse extends CommonJsonResponse
{
    public function getGenerators(): array
    {
        return $this->data;
    }
}