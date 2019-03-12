<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Invoice
{

    /** @var \K0nias\FakturoidApi\Model\Invoice\Parameters */
    private $parameters;

    /** @var \K0nias\FakturoidApi\Model\Invoice\OptionalParameters|null */
    private $optionalParameters;

    /**
     * @param \K0nias\FakturoidApi\Model\Line\Line|\K0nias\FakturoidApi\Model\Line\LineCollection $lines
     */
    public function __construct(Id $subjectId, PaymentMethod $paymentMethod, $lines, ?OptionalParameters $optionalParameters = null)
    {
        $parameters = new Parameters();

        $parameters->lines($lines)
            ->subject($subjectId)
            ->paymentMethod($paymentMethod);

        $this->parameters = $parameters;
        $this->optionalParameters = $optionalParameters;
    }

    /** @return mixed[] */
    public function getData(): array
    {
        return array_merge($this->getOptionalParameters(), $this->parameters->getParameters());
    }

    /** @return mixed[] */
    private function getOptionalParameters(): array
    {
        return array_merge($this->getDefaultOptionalParametersParameters(), $this->optionalParameters ? $this->optionalParameters->getParameters() : []);
    }

    /** @return mixed[] */
    private function getDefaultOptionalParametersParameters(): array
    {
        return [
            'due' => 14,
            'issued_on' => (new DateTimeImmutable())->format('Y-m-d'),
        ];
    }

}
