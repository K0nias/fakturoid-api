<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

interface RequestUrlResolverInterface
{

    /**
     * @param RequestInterface $request
     *
     * @return string
     */
    public function getRequestUrl(RequestInterface $request): string;
}