<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;

final class GetSubjectResponse extends CommonJsonResponse
{

    /**
     * @return mixed[]
     */
    public function getSubject(): array
    {
        return $this->data;
    }

}
