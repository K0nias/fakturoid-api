<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Parameters;

final class ImmutableParameterBag
{

    /** @var mixed[] */
    private $parameters;

    /**
     * @param mixed[] $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @param mixed $value
     */
    public function set(string $name, $value): ImmutableParameterBag
    {
        return new self(array_merge($this->parameters, [$name => $value]));
    }

    /**
     * @return mixed
     */
    public function get(string $key)
    {
        if ( ! $this->has($key)) {
            throw new \OutOfBoundsException(sprintf('Not existing key: "%s".', $key));
        }

        return $this->parameters[$key];
    }

    /** @return mixed[] */
    public function getAll(): array
    {
        return $this->parameters;
    }

    public function has(string $key): bool
    {
        return key_exists($key, $this->parameters);
    }

}
