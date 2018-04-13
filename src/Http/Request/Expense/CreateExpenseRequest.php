<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Expense;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Expense\Expense;

final class CreateExpenseRequest implements RequestInterface
{
    const REQUEST_URI = 'expenses.json';
    /**
     * @var Expense
     */
    private $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
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
        return $this->expense->getData();
    }
}