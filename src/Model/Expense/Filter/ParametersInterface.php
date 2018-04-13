<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense\Filter;

use K0nias\FakturoidApi\Model\Filter\DocumentParametersInterface;
use K0nias\FakturoidApi\Model\Expense\Status;

interface ParametersInterface extends DocumentParametersInterface
{

    /**
     * @param Status $status
     *
     * @return ParametersInterface
     */
    public function status(Status $status): self;
}