<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice\Filter;

use K0nias\FakturoidApi\Model\Invoice\Status;
use K0nias\FakturoidApi\Model\Subject\Id;

interface ParametersInterface
{

    /**
     * @param Status $status
     *
     * @return ParametersInterface
     */
    public function status(Status $status): self;

    /**
     * @param Id $id
     *
     * @return self
     */
    public function subject(Id $id): self;

    /**
     * @param string $custom
     *
     * @return self
     */
    public function custom(string $custom): self;

    /**
     * @param string $number
     *
     * @return self
     */
    public function number(string $number): self;

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
     * @return array
     */
    public function getParameters(): array;
}