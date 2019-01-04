<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request\Reports;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;
use K0nias\FakturoidApi\Http\Request\RequestInterface;
use K0nias\FakturoidApi\Http\Response\Reports\GetReportsResponse;
use K0nias\FakturoidApi\Model\Filter\Year;

final class GetReportsRequest implements RequestInterface
{

    private const REQUEST_URI = 'reports/%s.json';

    /** @var \K0nias\FakturoidApi\Model\Filter\Year */
    private $year;

    public function __construct(Year $year)
    {
        $this->year = $year;
    }

    public function getUri(): string
    {
        return sprintf(self::REQUEST_URI, $this->year->getYear());
    }

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

    public function send(Api $api): GetReportsResponse
    {
        /** @var \K0nias\FakturoidApi\Http\Response\Reports\GetReportsResponse $response */
        $response = $api->process($this);

        return $response;
    }

}
