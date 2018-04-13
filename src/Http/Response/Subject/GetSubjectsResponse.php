<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetSubjectsResponse extends CommonJsonResponse
{
    public function getSubjects(): array
    {
        return $this->data;
    }
}