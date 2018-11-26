<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense\Filter;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Expense\Status;
use K0nias\FakturoidApi\Model\Subject\Id;

interface ParametersInterface
{

    public function status(Status $status): self;

    public function subject(Id $id): self;

    public function variableSymbol(string $variableSymbol): self;

    public function number(string $number): self;

    public function page(int $page): self;

    public function since(DateTimeImmutable $date): self;

    public function updatedSince(DateTimeImmutable $date): self;

    /**
     * @return mixed[]
     */
    public function getParameters(): array;

}
