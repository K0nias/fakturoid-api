<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense;

use K0nias\FakturoidApi\Model\Expense\Expense;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Expense\OptionalParameters;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

use function Patchwork\{redefine, restoreAll};


class ExpenseTest extends TestCase
{

    public function createExpense(?OptionalParameters $optionalParameters = null, ?\DateTimeImmutable $dueDate = null)
    {
        $line = new Line('Work hour', 100, 1.0);

        if ( ! $dueDate) {
            $dueDate = new \DateTimeImmutable();
        }

        return new Expense(new SubjectId(10), $line, $dueDate, $optionalParameters);
    }

    public function getExpenseMinimalData()
    {
        return [
            'subject_id' => 10,
            'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
            'due_on' => (new \DateTime())->format('Y-m-d'),
        ];
    }

    public function getExpenseWithOptionalData()
    {
        return array_merge($this->getExpenseMinimalData(), ['issued_on' => '2018-04-01']);
    }

    public function testDueDateInPast()
    {
        $dueDate = new \DateTimeImmutable();
        $dueDate = $dueDate->modify('-1 day');

        $expense = $this->createExpense(null, $dueDate);

        $testedData = [
            'subject_id' => 10,
                    'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
            'due_on' => $dueDate->format('Y-m-d'),
            'issued_on' => $dueDate->format('Y-m-d'),
        ];
        $originalData = $expense->getData();

        $this->assertEquals($testedData, $originalData);
    }

    public function testExpenseMinimalData()
    {
        $expense = $this->createExpense();

        $testedData = $this->getExpenseMinimalData();
        $originalData = $expense->getData();

        $this->assertEquals($testedData, $originalData);
    }

    public function testExpenseWithOptionalData()
    {
        $optionalData = new OptionalParameters();
        $optionalData->issuedDate(new \DateTimeImmutable('2018-04-01'));

        $expense = $this->createExpense($optionalData);

        $testedData = $this->getExpenseWithOptionalData();
        $originalData = $expense->getData();

        $this->assertEquals($testedData, $originalData);
    }
}