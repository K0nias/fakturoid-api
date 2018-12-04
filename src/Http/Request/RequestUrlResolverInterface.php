<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

interface RequestUrlResolverInterface
{

    public function getRequestUrl(RequestInterface $request): string;

}
