<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

use K0nias\FakturoidApi\Http\Request\RequestInterface;

final class ResponseResolver implements ResponseResolverInterface
{

    public function resolve(RequestInterface $request, string $content = ''): ResponseInterface
    {
        return $this->createResponseClass($request, $content);
    }

    private function getResponseClass(RequestInterface $request): string
    {
        return str_replace('Request', 'Response', get_class($request));
    }

    private function createResponseClass(RequestInterface $request, string $content): ResponseInterface
    {
        $responseClass = $this->getResponseClass($request);

        if ( ! class_exists($responseClass)) {
            throw new \K0nias\FakturoidApi\Exception\MissingResponseClassException(sprintf('Missing response class "%s" for "%s" request ', $responseClass, get_class($request)));
        }

        return new $responseClass($content);
    }

}
