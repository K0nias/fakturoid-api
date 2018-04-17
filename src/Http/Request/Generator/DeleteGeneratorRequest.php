<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Generator;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Generator\Id;

final class DeleteGeneratorRequest implements RequestInterface
{
    const REQUEST_URI = 'generators/%s.json';

    /**
     * @var Id
     */
    private $id;

    /**
     * @param Id $id
     */
    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->id->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): Method
    {
        return Method::DELETE();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }
}