<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id;

final class Invoice
{
    /**
     * @var Id
     */
    private $subjectId;
    /**
     * @var string
     */
    private $number;
    /**
     * @var PaymentMethod
     */
    private $paymentMethod;
    /**
     * @var LineCollection
     */
    private $lines;
    /**
     * @var OptionalParameters|null
     */
    private $optionalParameters;


    /**
     * @param Id                        $subjectId
     * @param string                    $number
     * @param PaymentMethod             $paymentMethod
     * @param Line|LineCollection       $lines
     * @param OptionalParameters|null   $optionalParameters
     */
    public function __construct(Id $subjectId, string $number, PaymentMethod $paymentMethod, $lines, ?OptionalParameters $optionalParameters = null)
    {
        if ( ! $lines instanceof Line && ! $lines instanceof LineCollection) {
            throw new InvalidParameterException(sprintf('Lines parameter must be instance of %s or %s.', Line::class, LineCollection::class));
        }

        if ($lines instanceof Line) {
            $lines = new LineCollection([$lines]);
        }

        $this->subjectId = $subjectId;
        $this->number = $number;
        $this->paymentMethod = $paymentMethod;
        $this->lines = $lines;
        $this->optionalParameters = $optionalParameters;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [
            'subject_id' => $this->subjectId->getId(),
            'number' => $this->number,
            'payment_method' => $this->paymentMethod->getMethod(),
            'lines' => $this->getLinesData(),
        ];

        return array_merge($this->getOptionalParameters(), $data);
    }

    /**
     * @return array
     */
    protected function getOptionalParameters(): array
    {
        return array_merge($this->getDefaultOptionalParametersParameters(), $this->optionalParameters ? $this->optionalParameters->getParameters() : []);
    }

    /**
     * @return array
     */
    protected function getDefaultOptionalParametersParameters()
    {
        return [
            'due' => 14,
            'issued_on' => (new \DateTimeImmutable())->format('Y-m-d'),
        ];
    }

    /**
     * @return array
     */
    protected function getLinesData(): array
    {
        return array_map(function (Line $line) {
            return $line->getData();
        }, $this->lines->getAll());
    }
}