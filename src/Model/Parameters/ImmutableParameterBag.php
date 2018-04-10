<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Parameters;


final class ImmutableParameterBag
{
    /**
     * @var array
     */
    private $parameters;


    /**
     * ImmutableParameterBag constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return ImmutableParameterBag
     */
    public function set(string $name, $value): ImmutableParameterBag
    {
        return new self(array_merge($this->parameters, [$name => $value]));
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->parameters;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return key_exists($key, $this->parameters);
    }
}