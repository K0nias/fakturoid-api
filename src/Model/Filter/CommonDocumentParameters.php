<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Filter;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Subject\Id;

final class CommonDocumentParameters implements DocumentParametersInterface
{

    /**
     * @var ImmutableParameterBag
     */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    /**
     * {@inheritdoc}
     */
    public function subject(Id $subjectId): DocumentParametersInterface
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function number(string $number): DocumentParametersInterface
    {
        $this->parameters = $this->parameters->set('number', $number);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function updatedSince(\DateTimeImmutable $date): DocumentParametersInterface
    {
        $this->parameters = $this->parameters->set('updated_since', $date->format(\DateTime::ATOM));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function since(\DateTimeImmutable $date): DocumentParametersInterface
    {
        $this->parameters = $this->parameters->set('since', $date->format(\DateTime::ATOM));

        return $this;
    }

    /**
     * @throws \OutOfRangeException
     *
     * {@inheritdoc}
     */
    public function page(int $page): DocumentParametersInterface
    {
        if (1 > $page) {
            throw new \OutOfRangeException(sprintf('Page must be positive integer. Given "%s"', $page));
        }

        $this->parameters = $this->parameters->set('page', $page);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }
}