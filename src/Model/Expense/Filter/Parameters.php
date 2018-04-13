<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense\Filter;

use K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters;
use K0nias\FakturoidApi\Model\Expense\Status;

final class Parameters extends CommonDocumentParameters implements ParametersInterface
{
    /**
     * {@inheritdoc}
     */
    public function status(Status $status): ParametersInterface
    {
        $this->parameters = $this->parameters->set('status', $status->getStatus());

        return $this;
    }
}