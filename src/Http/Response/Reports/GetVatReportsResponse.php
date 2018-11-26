<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Reports;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetVatReportsResponse extends CommonJsonResponse
{

    /**
     * @return mixed[][]
     */
    public function getReports(): array
    {
        return $this->data;
    }

}
