<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Expense
{

    /** @var \K0nias\FakturoidApi\Model\Expense\Parameters */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Expense\OptionalParameters|null */
    private $optionalParameters;

    /**
     * @param \K0nias\FakturoidApi\Model\Line\Line|\K0nias\FakturoidApi\Model\Line\LineCollection $lines
     */
    public function __construct(Id $subjectId, $lines, DateTimeImmutable $dueDate, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->lines($lines)
            ->dueDate($dueDate)
            ->subject($subjectId);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return mixed[]
     */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /**
     * @return mixed[]
     */
    private function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }

}
