<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Client;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Request\RequestUrlResolverInterface;
use K0nias\FakturoidApi\Http\Response\Response;

final class CurlClient implements ClientInterface
{

    /** @var \K0nias\FakturoidApi\Http\Request\RequestUrlResolverInterface */
    private $urlResolver;

    /** @var string */
    private $userAgent;

    /** @var string */
    private $email;

    /** @var string*/
    private $apiKey;

    public function __construct(RequestUrlResolverInterface $urlResolver, string $email, string $apiKey, string $userAgent)
    {
        $this->urlResolver = $urlResolver;
        $this->userAgent = $userAgent;
        $this->email = $email;
        $this->apiKey = $apiKey;
    }

    public function processRequest(RequestInterface $request): Response
    {
        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $this->urlResolver->getRequestUrl($request));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_FAILONERROR, false);
        curl_setopt($c, CURLOPT_USERPWD, sprintf('%s:%s', $this->email, $this->apiKey));
        curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($c, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($c, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        if ($request->getMethod()->sameAs(Method::POST())) {
            curl_setopt($c, CURLOPT_POST, true);
            curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($request->getData()));
        } elseif ($request->getMethod()->sameAs(Method::DELETE())) {
            curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'DELETE');
        } elseif ($request->getMethod()->sameAs(Method::PATCH())) {
            curl_setopt($c, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($request->getData()));
        }

        $responseContent = curl_exec($c);
        $info = curl_getinfo($c);

        return new Response($info['http_code'], (string) $responseContent);
    }

}
