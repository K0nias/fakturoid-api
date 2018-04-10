<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense;

use K0nias\FakturoidApi\Exception\FilterParameter\InvalidStatusException;
use K0nias\FakturoidApi\Model\Expense\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidStatusException::class);

        new Status('invalid_status');
    }

    public function testFactoryMethods()
    {
        $this->assertSame((Status::open())->getStatus(), Status::STATUS_OPEN);
        $this->assertSame((Status::overdue())->getStatus(), Status::STATUS_OVERDUE);
        $this->assertSame((Status::paid())->getStatus(), Status::STATUS_PAID);
    }
}