<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

final class Year
{
    /**
     * @var int
     */
    private $year;

    /**
     * @param int $year
     */
    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }
}