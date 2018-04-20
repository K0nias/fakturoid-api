<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi;

use K0nias\FakturoidApi\Client\ClientInterface;
use K0nias\FakturoidApi\Client\CurlClient;
use K0nias\FakturoidApi\Exception\InvalidAuthorizationException;
use K0nias\FakturoidApi\Http\Request\RequestUrlResolverInterface;
use K0nias\FakturoidApi\Http\Response\Response;
use K0nias\FakturoidApi\Http\Response\ResponseResolver;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\ResponseInterface;
use K0nias\FakturoidApi\Http\Response\ResponseResolverInterface;

final class Api implements RequestUrlResolverInterface
{
    const BASE_URL = 'https://app.fakturoid.cz/api/v2/accounts';
    private const URL_FORMAT = '%s/%s/%s';

    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string|null
     */
    private $userAgent;
    /**
     * @var ResponseResolverInterface
     */
    private $responseResolver;
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param string                         $slug
     * @param string                         $email
     * @param string                         $apiKey
     * @param ClientInterface|null           $client
     * @param string|null                    $userAgent
     * @param ResponseResolverInterface|null $responseResolver
     */
    public function __construct(string $slug, string $email, string $apiKey, ?ClientInterface $client = null, string $userAgent = null, ?ResponseResolverInterface $responseResolver = null)
    {
        $this->slug = $slug;
        $this->email = $email;
        $this->apiKey = $apiKey;
        $this->userAgent = $userAgent;
        $this->responseResolver = $responseResolver ?: new ResponseResolver();
        $this->client = $client ?: new CurlClient($this, $email, $apiKey, $this->getUserAgent());
    }

    /**
     * @throws InvalidAuthorizationException
     *
     * @param Response $response
     */
    protected function processResponseStatusCode(Response $response)
    {
        if (401 == $response->getStatusCode()) {
            throw new InvalidAuthorizationException('Invalid authorization');
        }
    }

    /**
     * @throws InvalidAuthorizationException
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function process(RequestInterface $request): ResponseInterface
    {
        $commonResponse = $this->client->processRequest($request);

        $this->processResponseStatusCode($commonResponse);

        return $this->responseResolver->resolve($request, $commonResponse->getContent());
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestUrl(RequestInterface $request): string
    {
        $url = sprintf(self::URL_FORMAT, self::BASE_URL, $this->slug, $request->getUri());

        if ($request->getMethod()->sameAs(Method::GET()) && $data = $request->getData()) {
            $url .= '?'.http_build_query($data);
        }

        return $url;
    }


    /**
     * @return string
     */
    protected function getUserAgent(): string
    {
        return $this->userAgent ?: sprintf('PHPlib <%s>', $this->email);
    }
}