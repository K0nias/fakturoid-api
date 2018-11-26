<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Http\Method;

interface RequestInterface
{

    public function getUri(): string;

    public function getMethod(): Method;

    /**
     * @return mixed[]
     */
    public function getData(): array;

}
