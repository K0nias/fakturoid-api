<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;

final class Parameters
{
    /**
     * @var ImmutableParameterBag
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
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
     * @param string $originalNumber
     *
     * @return self
     */
    public function originalNumber(string $originalNumber): self
    {
        $this->parameters = $this->parameters->set('original_number', $originalNumber);

        return $this;
    }

    /**
     * @param string $number
     *
     * @return self
     */
    public function number(string $number): self
    {
        $this->parameters = $this->parameters->set('number', $number);

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
     * @param \DateTimeImmutable $dueDate
     *
     * @return self
     */
    public function dueDate(\DateTimeImmutable $dueDate): self
    {
        $this->parameters = $this->parameters->set('due_on', $dueDate->format('Y-m-d'));

        return $this;
    }

    /**
     * @param \DateTimeImmutable $issuedDate
     *
     * @return self
     */
    public function issuedDate(\DateTimeImmutable $issuedDate): self
    {
        $this->parameters = $this->parameters->set('issued_on', $issuedDate->format('Y-m-d'));

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

        if ($this->parameters->has('due_on')) {
            $dueDate = \DateTime::createFromFormat('Y-m-d', $this->parameters->get('due_on'));
            $dueDate->setTime(0, 0, 0);
            $today = new \DateTime();
            $today->setTime(0, 0, 0);

            if ($dueDate < $today) {
                // if due date is in the past then issued date must be at least same
                $parameters['issued_on'] = $dueDate->format('Y-m-d');
            }
        }

        return $parameters;
    }
}