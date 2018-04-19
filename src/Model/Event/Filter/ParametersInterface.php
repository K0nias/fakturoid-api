<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Event\Filter;

use K0nias\FakturoidApi\Model\Subject\Id;

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
     * @param Id $subjectId
     *
     * @return self
     */
    public function subject(Id $subjectId): self;

    /**
     * @return array
     */
    public function getParameters(): array;
}