<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Periodic
{
    /**
     * @var ImmutableParameterBag
     */
    private $parameters;


    /**
     * Periodic constructor.
     *
     * @throws InvalidParameterException
     *
     * @param \DateTimeImmutable $startDate
     * @param int                $monthsPeriod
     */
    public function __construct(\DateTimeImmutable $startDate, int $monthsPeriod)
    {
        $this->parameters = new ImmutableParameterBag();

        $this->startDate($startDate);
        $this->monthsPeriod($monthsPeriod);
    }

    /**
     * @param \DateTimeImmutable $startDate
     *
     * @return self
     */
    protected function startDate(\DateTimeImmutable $startDate): self
    {
        $now = new \DateTime();
        $now->setTime(0, 0, 0);
        $testingDate = $startDate->setTime(0, 0, 0);

        if ($testingDate < $now) {
            throw new InvalidParameterException(sprintf('Start date must set at least to now or in the future.'));
        }

        $this->parameters = $this->parameters->set('start_date', $startDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @param \DateTimeImmutable $endDate
     *
     * @return self
     */
    public function endDate(\DateTimeImmutable $endDate): self
    {
        $this->parameters = $this->parameters->set('end_date', $endDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @param \DateTimeImmutable $nextOccurrenceDate
     *
     * @return self
     */
    public function nextOccurrenceDate(\DateTimeImmutable $nextOccurrenceDate): self
    {
        $this->parameters = $this->parameters->set('next_occurrence_on', $nextOccurrenceDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @param int $monthsPeriod
     *
     * @throws InvalidParameterException
     *
     * @return self
     */
    protected function monthsPeriod(int $monthsPeriod): self
    {
        if ($monthsPeriod < 1) {
            throw new InvalidParameterException(sprintf('Months period must be positive integer greater than 0. Given: %s', $monthsPeriod));
        }

        $this->parameters = $this->parameters->set('months_period', $monthsPeriod);

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }
}