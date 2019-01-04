<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Subject;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Subject\CreateSubjectResponse;
use K0nias\FakturoidApi\Model\Subject\Subject;

final class CreateSubjectRequest implements RequestInterface
{

    private const REQUEST_URI = 'subjects.json';

    /** @var \K0nias\FakturoidApi\Model\Subject\Subject */
    private $subject;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function getUri(): string
    {
        return self::REQUEST_URI;
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
        return $this->subject->getData();
    }

    public function send(Api $api): CreateSubjectResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Subject\CreateSubjectResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
