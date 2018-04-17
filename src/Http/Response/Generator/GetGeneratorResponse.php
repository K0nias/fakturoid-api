<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetGeneratorResponse extends CommonJsonResponse
{
    /**
     * @return array
     */
    public function getGenerator(): array
    {
        return $this->data;
    }
}