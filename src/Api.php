<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi;

use K0nias\FakturoidApi\Client\ClientInterface;
use K0nias\FakturoidApi\Client\CurlClient;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\NotSlugAwareRequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestUrlResolverInterface;
use K0nias\FakturoidApi\Http\Response\Response;
use K0nias\FakturoidApi\Http\Response\ResponseInterface;
use K0nias\FakturoidApi\Http\Response\ResponseResolver;
use K0nias\FakturoidApi\Http\Response\ResponseResolverInterface;

final class Api implements RequestUrlResolverInterface
{

    public const BASE_URL = 'https://app.fakturoid.cz/api/v2';
    private const URL_FORMAT = '%s/%s';

    /** @var string */
    private $slug;

    /** @var string */
    private $email;

    /** @var string|null */
    private $userAgent;

    /** @var \K0nias\FakturoidApi\Http\Response\ResponseResolverInterface */
    private $responseResolver;

    /** @var \K0nias\FakturoidApi\Client\ClientInterface */
    private $client;

    public function __construct(
        string $slug,
        string $email,
        string $apiKey,
        ?ClientInterface $client = null,
        ?string $userAgent = null,
        ?ResponseResolverInterface $responseResolver = null
    )
    {
        $this->slug = $slug;
        $this->email = $email;
        $this->userAgent = $userAgent;
        $this->responseResolver = $responseResolver ?: new ResponseResolver();
        $this->client = $client ?: new CurlClient($this, $email, $apiKey, $this->getUserAgent());
    }

    private function processResponseStatusCode(Response $response): void
    {
        if ($response->getStatusCode() === 401) {
            throw new \K0nias\FakturoidApi\Exception\InvalidAuthorizationException('Invalid authorization');
        }
    }

    private function getUserAgent(): string
    {
        return $this->userAgent ?: sprintf('PHPlib <%s>', $this->email);
    }

    public function process(RequestInterface $request): ResponseInterface
    {
        $commonResponse = $this->client->processRequest($request);

        $this->processResponseStatusCode($commonResponse);

        return $this->responseResolver->resolve($request, $commonResponse->getContent());
    }

    public function getRequestUrl(RequestInterface $request): string
    {
        $uri = sprintf('accounts/%s/', $this->slug);

        if ($request instanceof NotSlugAwareRequestInterface) {
            $uri = '';
        }

        $uri .= $request->getUri();

        $url = sprintf(self::URL_FORMAT, self::BASE_URL, $uri);

        $data = $request->getData();

        if ($request->getMethod()->sameAs(Method::GET()) && count($data) > 0) {
            $url .= '?' . http_build_query($data);
        }

        return $url;
    }

}
