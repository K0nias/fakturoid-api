<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

interface SearchParametersInterface
{

    public function page(int $page): SearchParametersInterface;

    public function query(string $query): SearchParametersInterface;

    /** @return mixed[] */
    public function getParameters(): array;

}
