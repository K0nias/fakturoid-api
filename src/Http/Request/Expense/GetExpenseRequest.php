<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Expense\GetExpenseResponse;
use K0nias\FakturoidApi\Model\Expense\Id;

final class GetExpenseRequest implements RequestInterface
{

    private const REQUEST_URI = 'expenses/%s.json';

    /** @var \K0nias\FakturoidApi\Model\Expense\Id */
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
        return Method::GET();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

    public function send(Api $api): GetExpenseResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Expense\GetExpenseResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
