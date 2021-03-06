<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Expense\DeleteExpenseResponse;
use K0nias\FakturoidApi\Model\Expense\Id;

final class DeleteExpenseRequest implements RequestInterface
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
        return Method::DELETE();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }

    public function send(Api $api): DeleteExpenseResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Expense\DeleteExpenseResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
