<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense\Filter;

use K0nias\FakturoidApi\Model\Filter\ParametersInterface as BaseParametersInterface;
use K0nias\FakturoidApi\Model\Expense\Status;

interface ParametersInterface extends BaseParametersInterface
{

    /**
     * @param Status $status
     *
     * @return ParametersInterface
     */
    public function status(Status $status): self;
}