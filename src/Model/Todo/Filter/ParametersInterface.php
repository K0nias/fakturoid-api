<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Todo\Filter;

use DateTimeImmutable;

interface ParametersInterface
{

    public function page(int $page): self;

    public function since(DateTimeImmutable $date): self;

    /**
     * @return mixed[]
     */
    public function getParameters(): array;

}
