<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

final class Subject
{

    /** @var \K0nias\FakturoidApi\Model\Subject\Parameters */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Subject\OptionalParameters|null */
    private $optionalParameters;

    public function __construct(string $name, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->name($name);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /**
     * @return mixed[]
     */
    private function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }

}
