<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\DataValidator\DueValidator;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;

final class Parameters
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Invoice\Parameters
     */
    public function subject(SubjectId $subjectId): self
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

        return $this;
    }

    public function number(string $number): self
    {
        $this->parameters = $this->parameters->set('number', $number);

        return $this;
    }

    public function custom(string $custom): self
    {
        $this->parameters = $this->parameters->set('custom_id', $custom);

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
        DueValidator::validate($due);

        $this->parameters = $this->parameters->set('due', $due);

        return $this;
    }


    public function issuedDate(DateTimeImmutable $issuedDate): self
    {
        $this->parameters = $this->parameters->set('issued_on', $issuedDate->format('Y-m-d'));

        return $this;
    }

    public function vatPriceMode(VatPriceMode $vatPriceMode): self
    {
        $this->parameters = $this->parameters->set('vat_price_mode', $vatPriceMode->getMode());

        return $this;
    }

    public function variableNumber(string $variableNumber): self
    {
        $this->parameters = $this->parameters->set('variable_symbol', $variableNumber);

        return $this;
    }

    public function roundTotal(bool $roundTotal): self
    {
        $this->parameters = $this->parameters->set('round_total', $roundTotal);

        return $this;
    }

    /**
     * @return mixed[][]
     */
    private function transformLinesData(LineCollection $lineCollection): array
    {
        return array_map(function (Line $line) {
            return $line->getData();
        }, $lineCollection->getAll());
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }

}
