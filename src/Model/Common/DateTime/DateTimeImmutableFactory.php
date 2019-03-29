<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Common\DateTime;

use DateTimeImmutable;

final class DateTimeImmutableFactory implements DateTimeImmutableFactoryInterface
{

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }

}
