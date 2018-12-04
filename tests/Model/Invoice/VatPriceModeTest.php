<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Invoice;

use K0nias\FakturoidApi\Model\Invoice\VatPriceMode;
use PHPUnit\Framework\TestCase;

class VatPriceModeTest extends TestCase
{

    public function testInvalidMode(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidOptionParameterException::class);

        new VatPriceMode('invalid_mode');
    }

    public function testFactoryMethods(): void
    {
        $this->assertSame(VatPriceMode::withoutVat()->getMode(), VatPriceMode::MODE_WITHOUT_VAT);
        $this->assertSame(VatPriceMode::withVat()->getMode(), VatPriceMode::MODE_WITH_VAT);
    }

}
