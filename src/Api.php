<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi;

use K0nias\FakturoidApi\Exception\InvalidAuthorizationException;
use K0nias\FakturoidApi\Http\Response\ResponseResolver;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\ResponseInterface;
use K0nias\FakturoidApi\Http\Response\ResponseResolverInterface;

final class Api
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
     * @param string                         $slug
     * @param string                         $email
     * @param string                         $apiKey
     * @param string|null                    $userAgent
     * @param ResponseResolverInterface|null $responseResolver
     */
    public function __construct(string $slug, string $email, string $apiKey, string $userAgent = null, ResponseResolverInterface $responseResolver = null)
    {
        $this->slug = $slug;
        $this->email = $email;
        $this->apiKey = $apiKey;
        $this->userAgent = $userAgent;
        $this->responseResolver = $responseResolver ?: new ResponseResolver();
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function process(RequestInterface $request): ResponseInterface
    {
        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $this->getUrl($request));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_FAILONERROR, false);
        curl_setopt($c, CURLOPT_USERPWD, sprintf('%s:%s', $this->email, $this->apiKey));
        curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($c, CURLOPT_USERAGENT, $this->getUserAgent());
        curl_setopt($c, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

        $responseContent = curl_exec($c);
        $info = curl_getinfo($c);

        if (401 == $info['http_code']) {
            throw new InvalidAuthorizationException('Invalid authorization');
        }

        return $this->responseResolver->resolve($request, $responseContent);
    }

    protected function getUrl(RequestInterface $request): string
    {
        $url = sprintf(self::URL_FORMAT, self::BASE_URL, $this->slug, $request->getUri());

        if ($request->getMethod()->sameAs(Method::GET()) && $data = $request->getData()) {
            $url .= '?'.http_build_query($data);
        }


        return $url;
    }

    protected function getUserAgent(): string
    {
        return $this->userAgent ?: sprintf('PHPlib <%s>', $this->email);
    }
}