<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Expense\Filter;

use K0nias\FakturoidApi\Model\Expense\Filter\Parameters;
use K0nias\FakturoidApi\Model\Expense\Status;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $status = Status::open();
        $subject = new Id(1);
        $page = 1;
        $sinceDate = new \DateTimeImmutable();
        $updatedSinceDate = new \DateTimeImmutable();
        $variableSymbol = '1111222';
        $number = '2018-0005';

        $parametersFilter = (new Parameters())
            ->status($status)
            ->subject($subject)
            ->page($page)
            ->since($sinceDate)
            ->updatedSince($updatedSinceDate)
            ->variableSymbol($variableSymbol)
            ->number($number);

        $this->assertEquals([
            'status' => $status->getStatus(),
            'subject_id' => $subject->getId(),
            'page' => $page,
            'since' => $sinceDate->format(\DateTime::ATOM),
            'updated_since' => $updatedSinceDate->format(\DateTime::ATOM),
            'variable_symbol' => $variableSymbol,
            'number' => $number,
        ], $parametersFilter->getParameters());
    }
}