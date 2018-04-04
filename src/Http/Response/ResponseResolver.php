<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

use K0nias\FakturoidApi\Exception\MissingResponseClassException;
use K0nias\FakturoidApi\Http\Request\RequestInterface;

final class ResponseResolver implements ResponseResolverInterface
{

    /**
     * {@inheritdoc}
     */
    public function resolve(RequestInterface $request, string $content = ''): ResponseInterface
    {
        return $this->createResponseClass($request, $content);
    }

    /**
     * @param RequestInterface $command
     *
     * @return string
     */
    protected function getResponseClass(RequestInterface $request): string
    {
        return str_replace('Request', 'Response', get_class($request));
    }

    /**
     * @param RequestInterface $request
     * @param string           $content
     *
     * @return ResponseInterface
     */
    protected function createResponseClass(RequestInterface $request, string $content): ResponseInterface
    {
        $responseClass = $this->getResponseClass($request);

        if ( ! class_exists($responseClass)) {
            throw new MissingResponseClassException(sprintf('Missing response class "%s" for "%s" request ', $responseClass, get_class($request)));
        }

        return new $responseClass($content);
    }
}