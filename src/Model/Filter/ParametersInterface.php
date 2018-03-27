<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;

interface ParametersInterface
{

    /**
     * @param Id $subjectId
     *
     * @return ParametersInterface
     */
    public function subject(Id $subjectId): self;

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
    public function page(int $id): self;

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