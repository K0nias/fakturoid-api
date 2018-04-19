<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject\Filter;

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
     * @param \DateTimeImmutable $date
     *
     * @return self
     */
    public function updatedSince(\DateTimeImmutable $date): self;

    /**
     * @param string $custom
     *
     * @return self
     */
    public function custom(string $custom): self;

    /**
     * @return array
     */
    public function getParameters(): array;
}