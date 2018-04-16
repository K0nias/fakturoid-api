<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Generator;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Currency\CurrencyInterface;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;

final class Parameters
{
    /**
     * @var ImmutableParameterBag
     */
    private $parameters;
    /**
     * @var Periodic|null
     */
    private $periodic;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    /**
     * @param CurrencyInterface $currency
     *
     * @return Parameters
     */
    public function currency(CurrencyInterface $currency): self
    {
        $this->parameters = $this->parameters->set('currency', $currency->getCode());

        return $this;
    }

    /**
     * @param Periodic|null $periodic
     *
     * @return Parameters
     */
    public function periodical(?Periodic $periodic = null): self
    {
        $this->periodic = $periodic;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Parameters
     */
    public function name(string $name): self
    {
        $this->parameters = $this->parameters->set('name', $name);

        return $this;
    }

    /**
     * @param bool $proforma
     *
     * @return Parameters
     */
    public function proforma(bool $proforma): self
    {
        $this->parameters = $this->parameters->set('proforma', $proforma);

        return $this;
    }

    /**
     * @param SubjectId $subjectId
     *
     * @return Parameters
     */
    public function subject(SubjectId $subjectId): self
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

        return $this;
    }

    /**
     * @param string $id
     *
     * @return Parameters
     */
    public function custom(string $id): self
    {
        $this->parameters = $this->parameters->set('custom_id', $id);

        return $this;
    }

    /**
     * @param PaymentMethod $paymentMethod
     *
     * @return self
     */
    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->parameters = $this->parameters->set('payment_method', $paymentMethod->getMethod());

        return $this;
    }


    /**
     * @param Line|LineCollection $lines
     *
     * @return self
     */
    public function lines($lines): self
    {
        if ( ! $lines instanceof Line && ! $lines instanceof LineCollection) {
            throw new InvalidParameterException(sprintf('Lines parameter must be instance of %s or %s.', Line::class, LineCollection::class));
        }

        if ($lines instanceof Line) {
            $lines = new LineCollection([$lines]);
        }

        $this->parameters = $this->parameters->set('lines', $this->transformLinesData($lines));

        return $this;
    }

    /**
     * @param int $due
     *
     * @throws InvalidParameterException
     *
     * @return self
     */
    public function due(int $due): self
    {
        if ($due < 1) {
            throw new InvalidParameterException(sprintf('Due must be positive integer greater than 0. Given: %s', $due));
        }

        $this->parameters = $this->parameters->set('due', $due);

        return $this;
    }

    /**
     * @param LineCollection $lineCollection
     *
     * @return array
     */
    protected function transformLinesData(LineCollection $lineCollection): array
    {
        return array_map(function (Line $line) {
            return $line->getData();
        }, $lineCollection->getAll());
    }

    /**
     * @return array
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