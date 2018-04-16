<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Subject\Id;
use K0nias\FakturoidApi\Model\Subject\Parameters;

final class UpdateSubjectRequest implements RequestInterface
{
    const REQUEST_URI = 'subjects/%s.json';

    /**
     * @var Id
     */
    private $id;
    /**
     * @var Parameters
     */
    private $parameters;

    public function __construct(Id $id, Parameters $parameters)
    {
        $this->id = $id;
        $this->parameters = $parameters;
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
        return Method::PATCH();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->parameters->getParameters();
    }
}