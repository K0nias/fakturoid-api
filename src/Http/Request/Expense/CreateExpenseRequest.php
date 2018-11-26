<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Expense\Expense;

final class CreateExpenseRequest implements RequestInterface
{

    private const REQUEST_URI = 'expenses.json';

    /** @var \K0nias\FakturoidApi\Model\Expense\Expense */
    private $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
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
        return $this->expense->getData();
    }

}
