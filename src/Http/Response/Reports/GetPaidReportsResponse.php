<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Reports;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetPaidReportsResponse extends CommonJsonResponse
{
    public function getReports(): array
    {
        return $this->data;
    }
}