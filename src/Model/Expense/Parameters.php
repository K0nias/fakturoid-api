<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use DateTime;
use DateTimeImmutable;
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

    public function subject(SubjectId $subjectId): self
    {
        $this->parameters = $this->parameters->set('subject_id', $subjectId->getId());

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

    public function originalNumber(string $originalNumber): self
    {
        $this->parameters = $this->parameters->set('original_number', $originalNumber);

        return $this;
    }

    public function number(string $number): self
    {
        $this->parameters = $this->parameters->set('number', $number);

        return $this;
    }

    public function paymentMethod(PaymentMethod $paymentMethod): self
    {
        $this->parameters = $this->parameters->set('payment_method', $paymentMethod->getMethod());

        return $this;
    }

    public function dueDate(DateTimeImmutable $dueDate): self
    {
        $this->parameters = $this->parameters->set('due_on', $dueDate->format('Y-m-d'));

        return $this;
    }

    public function issuedDate(DateTimeImmutable $issuedDate): self
    {
        $this->parameters = $this->parameters->set('issued_on', $issuedDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @return mixed[][]
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

        if ($this->parameters->has('due_on')) {
            /**
             * @see Parameters::dueDate
             * @var \DateTime $dueDate this date will be always correct
             */
            $dueDate = DateTime::createFromFormat('Y-m-d', $this->parameters->get('due_on'));
            $dueDate->setTime(0, 0, 0);

            $today = new DateTime();
            $today->setTime(0, 0, 0);

            if ($dueDate < $today) {
                // if due date is in the past then issued date must be at least same
                $parameters['issued_on'] = $dueDate->format('Y-m-d');
            }
        }

        return $parameters;
    }

}
