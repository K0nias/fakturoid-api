<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Subject;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Subject\Subject;

final class CreateSubjectRequest implements RequestInterface
{
    const REQUEST_URI = 'subjects.json';

    /**
     * @var Subject
     */
    private $subject;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return self::REQUEST_URI;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): Method
    {
        return Method::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->subject->getData();
    }
}