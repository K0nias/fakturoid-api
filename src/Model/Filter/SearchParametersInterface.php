<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

interface SearchParametersInterface
{
    /**
     * @param int $page
     *
     * @return SearchParametersInterface
     */
    public function page(int $id): self;

    /**
     * @param string $query
     *
     * @return SearchParametersInterface
     */
    public function query(string $query): self;

    /**
     * @return array
     */
    public function getParameters(): array;
}