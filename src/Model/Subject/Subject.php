<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

final class Subject
{
    /**
     * @var Parameters
     */
    private $parameters;
    /**
     * @var OptionalParameters|null
     */
    private $optionalParameters;


    /**
     * @param string                    $name
     * @param OptionalParameters|null   $optionalParameters
     */
    public function __construct(string $name, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->name($name);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }
}