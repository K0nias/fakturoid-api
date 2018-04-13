<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Expense
{
    /**
     * @var Parameters
     */
    private $parameters;
    /**
     * @var OptionalParameters|null
     */
    private $optionalParameters;
    /**
     * @var \DateTimeImmutable
     */
    private $dueDate;


    /**
     * @param Id                      $subjectId
     * @param Line|LineCollection     $lines
     * @param \DateTimeImmutable      $dueDate
     * @param OptionalParameters|null $optionalParameters
     */
    public function __construct(Id $subjectId, $lines, \DateTimeImmutable $dueDate, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->lines($lines)
            ->dueDate($dueDate)
            ->subject($subjectId);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
        $this->dueDate = $dueDate;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }
}