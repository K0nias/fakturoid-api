<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Todo;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Todo\Id;

final class ToggleTodoCompletionRequest implements RequestInterface
{

    private const REQUEST_URI = 'todos/%s/toggle_completion.json';

    /** @var \K0nias\FakturoidApi\Model\Todo\Id */
    private $id;

    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId());
    }

    public function getMethod(): Method
    {
        return Method::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

}
