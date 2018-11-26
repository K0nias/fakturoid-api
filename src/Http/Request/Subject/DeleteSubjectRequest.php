<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Subject\Id;

final class DeleteSubjectRequest implements RequestInterface
{

    private const REQUEST_URI = 'subjects/%s.json';

    /** @var \K0nias\FakturoidApi\Model\Subject\Id */
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
