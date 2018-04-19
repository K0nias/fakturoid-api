<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice\Filter;

use K0nias\FakturoidApi\Model\Filter\CommonDocumentParameters;
use K0nias\FakturoidApi\Model\Invoice\Status;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Parameters implements ParametersInterface
{
    /**
     * @var ImmutableParameterBag
     */
    protected $parameters;


    /**
     * @var CommonDocumentParameters
     */
    private $commonParameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();

        $this->commonParameters = new CommonDocumentParameters();
    }

    /**
     * {@inheritdoc}
     */
    public function custom(string $custom): ParametersInterface
    {
        $this->parameters = $this->parameters->set('custom', $custom);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function updatedSince(\DateTimeImmutable $date): ParametersInterface
    {
        $this->commonParameters->updatedSince($date);

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function subject(Id $subjectId): ParametersInterface
    {
        $this->commonParameters->subject($subjectId);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function since(\DateTimeImmutable $date): ParametersInterface
    {
        $this->commonParameters->since($date);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function page(int $page): ParametersInterface
    {
        $this->commonParameters->page($page);

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function status(Status $status): ParametersInterface
    {
        $this->parameters = $this->parameters->set('status', $status->getStatus());

        return $this;
    }

    /**
     * {@inheritdoc}
     */
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