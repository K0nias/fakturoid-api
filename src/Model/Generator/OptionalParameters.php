<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

final class OptionalParameters
{

    /** @var \K0nias\FakturoidApi\Model\Generator\Parameters */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }

    public function periodical(?Periodic $periodic = null): self
    {
        $this->parameters->periodical($periodic);

        return $this;
    }

    public function proforma(bool $proforma): self
    {
        $this->parameters->proforma($proforma);

        return $this;
    }

    public function custom(string $id): self
    {
        $this->parameters->custom($id);

        return $this;
    }

    public function due(int $due): self
    {
        $this->parameters->due($due);

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

}
