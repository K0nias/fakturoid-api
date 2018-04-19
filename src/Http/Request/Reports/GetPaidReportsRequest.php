<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Reports;

use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Model\Filter\Year;

final class GetPaidReportsRequest implements RequestInterface
{
    const REQUEST_URI = 'reports/%s/paid.json';

    /**
     * @var Year
     */
    private $year;

    /**
     * @param Year $year
     */
    public function __construct(Year $year)
    {
        $this->year = $year;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->year->getYear());
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): Method
    {
        return Method::GET();
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return [];
    }
}