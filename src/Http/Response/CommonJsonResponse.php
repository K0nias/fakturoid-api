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

    public function hasError(): bool
    {
        return array_key_exists('errors', $this->data);
    }

    public function getErrors(): array
    {
        return $this->hasError() ? $this->data['errors'] : [];
    }
}
