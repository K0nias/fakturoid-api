<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Generator;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetRecurringGeneratorsResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getGenerators(): array
    {
        return $this->data;
    }

}
