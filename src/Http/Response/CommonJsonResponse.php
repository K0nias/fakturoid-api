<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

abstract class CommonJsonResponse implements ResponseInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->data = json_decode($content, true);
    }
}