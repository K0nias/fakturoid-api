<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

use K0nias\FakturoidApi\Http\Request\RequestInterface;

interface ResponseResolverInterface
{

    public function resolve(RequestInterface $request, string $content = ''): ResponseInterface;

}
