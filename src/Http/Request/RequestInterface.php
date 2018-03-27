<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Http\Method;

interface RequestInterface
{
    const METHOD_GET = 'GET';

    /**
     * @return string
     */
    public function getUri(): string;

    /**
     * @return Method
     */
    public function getMethod(): Method;

    /**
     * @return array
     */
    public function getData(): array;
}