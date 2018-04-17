<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Message;

use K0nias\FakturoidApi\Model\Invoice\Id;

final class Message
{
    /**
     * @var Id
     */
    private $invoiceId;
    /**
     * @var OptionalParameters|null
     */
    private $optionalParameters;

    public function __construct(Id $invoiceId, ?OptionalParameters $optionalParameters = null)
    {
        $this->invoiceId = $invoiceId;
        $this->optionalParameters = $optionalParameters;
    }


    /**
     * @return Id
     */
    public function getInvoiceId(): Id
    {
        return $this->invoiceId;
    }

    public function getData(): array
    {
        return $this->optionalParameters ? $this->optionalParameters->getParameters() : [];
    }
}