<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

interface SearchParametersInterface
{
    /**
     * @param int $page
     */
    public function page(int $page);

    /**
     * @param string $query
     */
    public function query(string $query);

    /**
     * @return array
     */
    public function getParameters(): array;
}