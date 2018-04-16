<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;

final class OptionalParameters
{

    /**
     * @var Parameters
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }

    /**
     * @param Periodic|null $periodic
     *
     * @return self
     */
    public function periodical(?Periodic $periodic = null): self
    {
        $this->parameters->periodical($periodic);

        return $this;
    }

    /**
     * @param bool $proforma
     *
     * @return self
     */
    public function proforma(bool $proforma): self
    {
        $this->parameters->proforma($proforma);

        return $this;
    }

    /**
     * @param string $id
     *
     * @return self
     */
    public function custom(string $id): self
    {
        $this->parameters->custom($id);

        return $this;
    }

    /**
     * @param int $due
     *
     * @throws InvalidParameterException
     *
     * @return self
     */
    public function due(int $due): self
    {
        $this->parameters->due($due);

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }
}