<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Client;

use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Response;

interface ClientInterface
{

    public function processRequest(RequestInterface $request): Response;

}
