<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Common\DateTime;

use DateTimeImmutable;

interface DateTimeImmutableFactoryInterface
{

    public function now(): DateTimeImmutable;

}
