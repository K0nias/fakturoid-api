<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response\Subject;

use K0nias\FakturoidApi\Http\Response\CommonJsonResponse;
use K0nias\FakturoidApi\Model\Subject\Id;

final class CreateSubjectResponse extends CommonJsonResponse
{

    public function getSubjectId(): Id
    {
        return new Id($this->data['id']);
    }
}