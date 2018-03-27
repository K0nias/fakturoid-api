<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Exception\FilterParameter\InvalidStatusException;
use K0nias\FakturoidApi\Model\Invoice\Status;
use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    public function testInvalidStatus()
    {
        $this->expectException(InvalidStatusException::class);

        new Status('invalid_status');
    }
}