<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Common\DateTime\DateTimeHelper;
use K0nias\FakturoidApi\Model\DataValidator\MonthsPeriodValidator;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Periodic
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Common\DateTime\DateTimeHelper */
    private $dateTimeHelper;

    /**
     * Periodic .
     */
    public function __construct(DateTimeImmutable $startDate, int $monthsPeriod)
    {
        $this->parameters = new ImmutableParameterBag();

        $this->dateTimeHelper = new DateTimeHelper();

        $this->startDate($startDate);
        $this->monthsPeriod($monthsPeriod);
    }

    private function startDate(DateTimeImmutable $startDate): self
    {
        if ($this->dateTimeHelper->isDateInPast($startDate)) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf('Start date must set at least to now or in the future.'));
        }

        $this->parameters = $this->parameters->set('start_date', $startDate->format('Y-m-d'));

        return $this;
    }

    public function endDate(DateTimeImmutable $endDate): self
    {
        $this->parameters = $this->parameters->set('end_date', $endDate->format('Y-m-d'));

        return $this;
    }

    public function nextOccurrenceDate(DateTimeImmutable $nextOccurrenceDate): self
    {
        $this->parameters = $this->parameters->set('next_occurrence_on', $nextOccurrenceDate->format('Y-m-d'));

        return $this;
    }

    private function monthsPeriod(int $monthsPeriod): self
    {
        MonthsPeriodValidator::validate($monthsPeriod);

        $this->parameters = $this->parameters->set('months_period', $monthsPeriod);

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }

}
