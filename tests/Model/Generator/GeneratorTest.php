<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Generator;

use K0nias\FakturoidApi\Model\Currency\Currency;
use K0nias\FakturoidApi\Model\Generator\Generator;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Generator\OptionalParameters;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{

    public function createGenerator(?OptionalParameters $optionalParameters = null)
    {
        $line = new Line('Work hour', 100, 1.0);

        return new Generator('testing name', new SubjectId(10), $line, PaymentMethod::bank(), Currency::aud(), $optionalParameters);
    }

    public function getGeneratorMinimalData()
    {
        return [
            'name' => 'testing name',
            'payment_method' => PaymentMethod::BANK_METHOD,
            'currency' => Currency::AUD_CURRENCY,
            'subject_id' => 10,
            'recurring' => false,
            'lines' => [[
                'name' => 'Work hour',
                'unit_price' => 100,
                'quantity' => 1.0,
            ]],
        ];
    }

    public function getInvoiceOptionalData()
    {
        return array_merge($this->getGeneratorMinimalData(), ['due' => 10]);
    }

    public function testGeneratorMinimalData()
    {
        $generator = $this->createGenerator();

        $testedData = $this->getGeneratorMinimalData();
        $originalData = $generator->getData();

        $this->assertEquals($testedData, $originalData);
    }

    public function testGeneratorOptionalData()
    {
        $optionalData = new OptionalParameters();
        $optionalData->due(10);

        $generator = $this->createGenerator($optionalData);

        $testedData = $this->getInvoiceOptionalData();
        $originalData = $generator->getData();

        $this->assertEquals($testedData, $originalData);
    }
}