<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;

abstract class CommonDocumentParameters extends CommonParameters implements DocumentParametersInterface
{
    /**
     * {@inheritdoc}
     */
    public function subject(Id $subjectId): DocumentParametersInterface
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

        return $this;
    }
}