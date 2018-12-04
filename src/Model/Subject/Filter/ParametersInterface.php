<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject\Filter;

use DateTimeImmutable;

interface ParametersInterface
{

    public function page(int $page): self;

    public function since(DateTimeImmutable $date): self;

    public function updatedSince(DateTimeImmutable $date): self;

    public function custom(string $custom): self;

    /**
     * @return mixed[]
     */
    public function getParameters(): array;

}
