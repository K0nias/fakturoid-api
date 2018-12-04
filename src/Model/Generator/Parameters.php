<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Model\Currency\CurrencyInterface;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;

final class Parameters
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Generator\Periodic|null */
    private $periodic;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    public function currency(CurrencyInterface $currency): self
    {
        $this->parameters = $this->parameters->set('currency', $currency->getCode());

        return $this;
    }

    public function periodical(?Periodic $periodic = null): self
    {
        $this->periodic = $periodic;

        return $this;
    }

    public function name(string $name): self
    {
        $this->parameters = $this->parameters->set('name', $name);

        return $this;
    }

    public function proforma(bool $proforma): self
    {
        $this->parameters = $this->parameters->set('proforma', $proforma);

        return $this;
    }

    public function subject(SubjectId $subjectId): self
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

        return $this;
    }

    public function custom(string $id): self
    {
        $this->parameters = $this->parameters->set('custom_id', $id);

        return $this;
    }

    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->parameters = $this->parameters->set('payment_method', $paymentMethod->getMethod());

        return $this;
    }


    /**
     * @param \K0nias\FakturoidApi\Model\Line\Line|\K0nias\FakturoidApi\Model\Line\LineCollection|mixed $lines
     */
    public function lines($lines): self
    {
        if ( ! $lines instanceof Line && ! $lines instanceof LineCollection) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf(
                'Lines parameter must be instance of %s or %s.',
                Line::class,
                LineCollection::class
            ));
        }

        if ($lines instanceof Line) {
            $lines = new LineCollection([$lines]);
        }

        $this->parameters = $this->parameters->set('lines', $this->transformLinesData($lines));

        return $this;
    }

    public function due(int $due): self
    {
        if ($due < 1) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf(
                'Due must be positive integer greater than 0. Given: %s',
                $due
            ));
        }

        $this->parameters = $this->parameters->set('due', $due);

        return $this;
    }

    /**
     * @return mixed[]
     */
    protected function transformLinesData(LineCollection $lineCollection): array
    {
        return array_map(static function (Line $line) {
            return $line->getData();
        }, $lineCollection->getAll());
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        $parameters = $this->parameters->getAll();

        if ($this->periodic) {
            $parameters['recurring'] = true;
            $parameters = array_merge($parameters, $this->periodic->getParameters());
        } else {
            $parameters['recurring'] = false;
        }

        return $parameters;
    }

}
