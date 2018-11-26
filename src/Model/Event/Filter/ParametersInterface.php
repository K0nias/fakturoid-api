<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Event\Filter;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Subject\Id;

interface ParametersInterface
{

    public function page(int $page): self;

    public function since(DateTimeImmutable $date): self;

    public function subject(Id $subjectId): self;

    /**
     * @return mixed[]
     */
    public function getParameters(): array;

}
