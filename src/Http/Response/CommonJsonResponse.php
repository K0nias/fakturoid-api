<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

abstract class CommonJsonResponse implements ResponseInterface
{

    /** @var mixed[] */
    protected $data;

    public function __construct(string $content = '')
    {
        $this->data = json_decode($content, true);
    }

    public function hasError(): bool
    {
        return array_key_exists('errors', $this->data);
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->hasError() ? $this->data['errors'] : [];
    }

}
