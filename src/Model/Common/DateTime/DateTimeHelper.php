<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Common\DateTime;

use DateTimeInterface;

final class DateTimeHelper
{

    /** @var \K0nias\FakturoidApi\Model\Common\DateTime\DateTimeImmutableFactoryInterface */
    private $dateTimeImmutableFactory;

    public function __construct(?DateTimeImmutableFactoryInterface $dateTimeImmutableFactory = null)
    {
        $this->dateTimeImmutableFactory = $dateTimeImmutableFactory ?? new DateTimeImmutableFactory();
    }

    public function isDateInPast(DateTimeInterface $dateTime): bool
    {
        return $dateTime->format('Ymd') < $this->dateTimeImmutableFactory->now()->format('Ymd');
    }

}
