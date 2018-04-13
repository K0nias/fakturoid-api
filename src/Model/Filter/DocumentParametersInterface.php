<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;

interface DocumentParametersInterface extends ParametersInterface
{
    /**
     * @param Id $subjectId
     *
     * @return DocumentParametersInterface
     */
    public function subject(Id $subjectId): self;
}