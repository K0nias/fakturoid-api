<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice\Filter;

use K0nias\FakturoidApi\Model\Filter\CommonParameters;
use K0nias\FakturoidApi\Model\Invoice\Status;

final class Parameters extends CommonParameters implements ParametersInterface
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