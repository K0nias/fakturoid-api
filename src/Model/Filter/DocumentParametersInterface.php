<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Subject\Id;

interface DocumentParametersInterface
{

    public function subject(Id $id): self;

    public function number(string $number): self;

    public function page(int $page): self;

    public function since(DateTimeImmutable $date): self;

    public function updatedSince(DateTimeImmutable $date): self;

    /** @return mixed[] */
    public function getParameters(): array;

}
