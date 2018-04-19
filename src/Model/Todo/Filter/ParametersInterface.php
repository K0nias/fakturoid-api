<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Todo\Filter;

interface ParametersInterface
{
    /**
     * @param int $page
     *
     * @return self
     */
    public function page(int $page): self;

    /**
     * @param \DateTimeImmutable $date
     *
     * @return self
     */
    public function since(\DateTimeImmutable $date): self;

    /**
     * @return array
     */
    public function getParameters(): array;
}