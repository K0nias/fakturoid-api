<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Currency;

use K0nias\FakturoidApi\Model\Currency\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{

    public function testInvalidStatus(): void
    {
        $this->expectException(\K0nias\FakturoidApi\Exception\InvalidOptionParameterException::class);

        new Currency('invalid_currency');
    }

    public function testFactoryMethods(): void
    {
        $this->assertSame(Currency::czk()->getCode(), Currency::CZK_CURRENCY);
        $this->assertSame(Currency::eur()->getCode(), Currency::EUR_CURRENCY);
        $this->assertSame(Currency::gbp()->getCode(), Currency::GBP_CURRENCY);
        $this->assertSame(Currency::usd()->getCode(), Currency::USD_CURRENCY);
        $this->assertSame(Currency::aud()->getCode(), Currency::AUD_CURRENCY);
        $this->assertSame(Currency::bgn()->getCode(), Currency::BGN_CURRENCY);
        $this->assertSame(Currency::brl()->getCode(), Currency::BRL_CURRENCY);
        $this->assertSame(Currency::cad()->getCode(), Currency::CAD_CURRENCY);
        $this->assertSame(Currency::chf()->getCode(), Currency::CHF_CURRENCY);
        $this->assertSame(Currency::cny()->getCode(), Currency::CNY_CURRENCY);
        $this->assertSame(Currency::dkk()->getCode(), Currency::DKK_CURRENCY);
        $this->assertSame(Currency::hkd()->getCode(), Currency::HKD_CURRENCY);
        $this->assertSame(Currency::hrk()->getCode(), Currency::HRK_CURRENCY);
        $this->assertSame(Currency::huf()->getCode(), Currency::HUF_CURRENCY);
        $this->assertSame(Currency::idr()->getCode(), Currency::IDR_CURRENCY);
        $this->assertSame(Currency::ils()->getCode(), Currency::ILS_CURRENCY);
        $this->assertSame(Currency::inr()->getCode(), Currency::INR_CURRENCY);
        $this->assertSame(Currency::jpy()->getCode(), Currency::JPY_CURRENCY);
        $this->assertSame(Currency::kwd()->getCode(), Currency::KWD_CURRENCY);
        $this->assertSame(Currency::mxn()->getCode(), Currency::MXN_CURRENCY);
        $this->assertSame(Currency::myr()->getCode(), Currency::MYR_CURRENCY);
        $this->assertSame(Currency::pln()->getCode(), Currency::PLN_CURRENCY);
        $this->assertSame(Currency::nok()->getCode(), Currency::NOK_CURRENCY);
        $this->assertSame(Currency::nzd()->getCode(), Currency::NZD_CURRENCY);
        $this->assertSame(Currency::ron()->getCode(), Currency::RON_CURRENCY);
        $this->assertSame(Currency::rub()->getCode(), Currency::RUB_CURRENCY);
        $this->assertSame(Currency::sek()->getCode(), Currency::SEK_CURRENCY);
        $this->assertSame(Currency::sgd()->getCode(), Currency::SGD_CURRENCY);
        $this->assertSame(Currency::thb()->getCode(), Currency::THB_CURRENCY);
        $this->assertSame(Currency::try()->getCode(), Currency::TRY_CURRENCY);
        $this->assertSame(Currency::btc()->getCode(), Currency::BTC_CURRENCY);
        $this->assertSame(Currency::eth()->getCode(), Currency::ETH_CURRENCY);
        $this->assertSame(Currency::ltc()->getCode(), Currency::LTC_CURRENCY);
        $this->assertSame(Currency::xmr()->getCode(), Currency::XMR_CURRENCY);
    }

}
