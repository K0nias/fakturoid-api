<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use DateTime;
use DateTimeImmutable;
use K0nias\FakturoidApi\Model\Invoice\Invoice;
use K0nias\FakturoidApi\Model\Invoice\OptionalParameters;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Payment\Method;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{

    public function createInvoice(?OptionalParameters $optionalParameters = null): Invoice
    {
        $line = new Line('Work hour', 100, 1.0);

        return new Invoice(new SubjectId(10), Method::card(), $line, $optionalParameters);
    }

    /** @return mixed[] */
    public function getInvoiceMinimalData(): array
    {
        return [
            'subject_id' => 10,
            'payment_method' => Method::CARD_METHOD,
            'lines' =>
            [
                [
                    'name' => 'Work hour',
                    'unit_price' => 100,
                    'quantity' => 1.0,
                ],
            ],
            'due' => 14,
            'issued_on' => (new DateTime())->format('Y-m-d'),
        ];
    }

    /** @return mixed[] */
    public function getInvoiceWithOptionalData(): array
    {
        return array_merge(
            $this->getInvoiceMinimalData(),
            [
                'due' => 10,
                'issued_on' => (new DateTime('2018-04-01'))->format('Y-m-d'),
                'number' => '2018-0001',
                'round_total' => true,
                'custom_id' => 'Custom ID#1',
            ]
        );
    }

    public function testInvoiceMinimalData(): void
    {
        $invoice = $this->createInvoice();

        $testedData = $this->getInvoiceMinimalData();
        $originalData = $invoice->getData();

        $this->assertEquals($testedData, $originalData);
    }

    public function testInvoiceWithOptionalData(): void
    {
        $optionalData = new OptionalParameters();
        $optionalData->issuedDate(new DateTimeImmutable('2018-04-01'))
            ->due(10)
            ->number('2018-0001')
            ->roundTotal(true)
            ->custom('Custom ID#1');

        $invoice = $this->createInvoice($optionalData);

        $testedData = $this->getInvoiceWithOptionalData();
        $originalData = $invoice->getData();

        $this->assertEquals($testedData, $originalData);
    }

}
