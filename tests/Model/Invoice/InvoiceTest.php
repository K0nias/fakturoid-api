<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Model\Invoice\Invoice;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Invoice\OptionalParameters;
use K0nias\FakturoidApi\Model\Payment\Method;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{

    public function createInvoice(?OptionalParameters $optionalParameters = null)
    {
        $line = new Line('Work hour', 100, 1.0);

        return new Invoice(new SubjectId(10), Method::card(), $line, $optionalParameters);
    }

    public function getInvoiceMinimalData()
    {
        return [
            'subject_id' => 10,
            'payment_method' => Method::CARD_METHOD,
            'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
            'due' => 14,
            'issued_on' => (new \DateTime())->format('Y-m-d'),
        ];
    }

    public function getInvoiceWithOptionalData()
    {
        return array_merge(
            $this->getInvoiceMinimalData(),
            [
                'due' => 10,
                'issued_on' => (new \DateTime('2018-04-01'))->format('Y-m-d'),
                'number' => '2018-0001',
                'custom_id' => 'Custom ID#1',
            ]
        );
    }

    public function testInvoiceMinimalData()
    {
        $invoice = $this->createInvoice();

        $testedData = $this->getInvoiceMinimalData();
        $originalData = $invoice->getData();

        $this->assertEquals($testedData, $originalData);
    }

    public function testInvoiceWithOptionalData()
    {
        $optionalData = new OptionalParameters();
        $optionalData->issuedDate(new \DateTimeImmutable('2018-04-01'))
                            ->due(10)
                            ->number('2018-0001')
                            ->custom('Custom ID#1');

        $invoice = $this->createInvoice($optionalData);

        $testedData = $this->getInvoiceWithOptionalData();
        $originalData = $invoice->getData();

        $this->assertEquals($testedData, $originalData);
    }
}