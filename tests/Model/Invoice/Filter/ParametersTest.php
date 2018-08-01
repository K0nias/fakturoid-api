<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice\Filter;

use K0nias\FakturoidApi\Model\Invoice\Filter\Parameters;
use K0nias\FakturoidApi\Model\Invoice\Status;
use K0nias\FakturoidApi\Model\Subject\Id;
use PHPUnit\Framework\TestCase;

class CommonParametersTest extends TestCase
{
    public function testParametersValue()
    {
        $status = Status::open();
        $subject = new Id(1);
        $page = 1;
        $sinceDate = new \DateTimeImmutable();
        $updatedSinceDate = new \DateTimeImmutable();
        $custom = '1111222';
        $number = '2018-0005';

        $parametersFilter = (new Parameters())
            ->status($status)
            ->subject($subject)
            ->page($page)
            ->since($sinceDate)
            ->updatedSince($updatedSinceDate)
            ->number($number)
            ->custom($custom);

        $this->assertEquals([
            'status' => $status->getStatus(),
            'subject_id' => $subject->getId(),
            'page' => $page,
            'since' => $sinceDate->format(\DateTime::ATOM),
            'updated_since' => $updatedSinceDate->format(\DateTime::ATOM),
            'custom_id' => $custom,
            'number' => $number,
        ], $parametersFilter->getParameters());
    }
}