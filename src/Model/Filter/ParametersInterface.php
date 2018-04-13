<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;


interface ParametersInterface
{

    /**
     * @param string $id
     *
     * @return ParametersInterface
     */
    public function custom(string $id): self;

    /**
     * @param int $page
     *
     * @return ParametersInterface
     */
    public function page(int $page): self;

    /**
     * @param \DateTimeImmutable $date
     *
     * @return ParametersInterface
     */
    public function since(\DateTimeImmutable $date): self;

    /**
     * @param \DateTimeImmutable $date
     *
     * @return ParametersInterface
     */
    public function updatedSince(\DateTimeImmutable $date): self;

    /**
     * @return array
     */
    public function getParameters(): array;
}