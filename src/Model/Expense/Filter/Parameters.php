<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense\Filter;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Expense\Status;
use K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Parameters implements ParametersInterface
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    protected $parameters;

    /** @var \K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters */
    private $commonParameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();

        $this->commonParameters = new CommonDocumentParameters();
    }

    public function subject(Id $subjectId): ParametersInterface
    {
        $this->commonParameters->subject($subjectId);

        return $this;
    }

    public function updatedSince(DateTimeImmutable $date): ParametersInterface
    {
        $this->commonParameters->updatedSince($date);

        return $this;
    }

    public function since(DateTimeImmutable $date): ParametersInterface
    {
        $this->commonParameters->since($date);

        return $this;
    }

    public function page(int $page): ParametersInterface
    {
        $this->commonParameters->page($page);

        return $this;
    }


    public function status(Status $status): ParametersInterface
    {
        $this->parameters = $this->parameters->set('status', $status->getStatus());

        return $this;
    }

    public function variableSymbol(string $variableSymbol): ParametersInterface
    {
        $this->parameters = $this->parameters->set('variable_symbol', $variableSymbol);

        return $this;
    }

    public function number(string $number): ParametersInterface
    {
        $this->commonParameters->number($number);

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        return array_merge($this->commonParameters->getParameters(), $this->parameters->getAll());
    }

}
