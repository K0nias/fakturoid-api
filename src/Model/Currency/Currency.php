<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Currency;

final class Currency implements CurrencyInterface
{

    public const CZK_CURRENCY = 'CZK';
    public const EUR_CURRENCY = 'EUR';
    public const GBP_CURRENCY = 'GBP';
    public const USD_CURRENCY = 'USD';
    public const AUD_CURRENCY = 'AUD';
    public const BGN_CURRENCY = 'BGN';
    public const BRL_CURRENCY = 'BRL';
    public const CAD_CURRENCY = 'CAD';
    public const CHF_CURRENCY = 'CHF';
    public const CNY_CURRENCY = 'CNY';
    public const DKK_CURRENCY = 'DKK';
    public const HKD_CURRENCY = 'HKD';
    public const HRK_CURRENCY = 'HRK';
    public const HUF_CURRENCY = 'HUF';
    public const IDR_CURRENCY = 'IDR';
    public const ILS_CURRENCY = 'ILS';
    public const INR_CURRENCY = 'INR';
    public const JPY_CURRENCY = 'JPY';
    public const KWD_CURRENCY = 'KWD';
    public const MXN_CURRENCY = 'MXN';
    public const MYR_CURRENCY = 'MYR';
    public const PLN_CURRENCY = 'PLN';
    public const NOK_CURRENCY = 'NOK';
    public const NZD_CURRENCY = 'NZD';
    public const RON_CURRENCY = 'RON';
    public const RUB_CURRENCY = 'RUB';
    public const SEK_CURRENCY = 'SEK';
    public const SGD_CURRENCY = 'SGD';
    public const THB_CURRENCY = 'THB';
    public const TRY_CURRENCY = 'TRY';

    public const BTC_CURRENCY = 'BTC';
    public const ETH_CURRENCY = 'ETH';
    public const LTC_CURRENCY = 'LTC';
    public const XMR_CURRENCY = 'XMR';

    private const AVAILABLE_CURRENCIES = [
        self::CZK_CURRENCY,
        self::EUR_CURRENCY,
        self::GBP_CURRENCY,
        self::USD_CURRENCY,
        self::AUD_CURRENCY,
        self::BGN_CURRENCY,
        self::BRL_CURRENCY,
        self::CAD_CURRENCY,
        self::CHF_CURRENCY,
        self::CNY_CURRENCY,
        self::DKK_CURRENCY,
        self::HKD_CURRENCY,
        self::HRK_CURRENCY,
        self::HUF_CURRENCY,
        self::IDR_CURRENCY,
        self::ILS_CURRENCY,
        self::INR_CURRENCY,
        self::JPY_CURRENCY,
        self::KWD_CURRENCY,
        self::MXN_CURRENCY,
        self::MYR_CURRENCY,
        self::PLN_CURRENCY,
        self::NOK_CURRENCY,
        self::NZD_CURRENCY,
        self::RON_CURRENCY,
        self::RUB_CURRENCY,
        self::SEK_CURRENCY,
        self::SGD_CURRENCY,
        self::THB_CURRENCY,
        self::TRY_CURRENCY,
        self::BTC_CURRENCY,
        self::ETH_CURRENCY,
        self::LTC_CURRENCY,
        self::XMR_CURRENCY,
    ];

    /** @var string */
    private $code;

    public function __construct(string $code)
    {
        $code = strtoupper($code);

        if ( ! in_array($code, self::AVAILABLE_CURRENCIES)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom(
                $code,
                self::AVAILABLE_CURRENCIES,
                'Invalid currency. Given: "%s". Available currencies: "%s".'
            );
        }

        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function czk(): self
    {
        return new self(self::CZK_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function eur(): self
    {
        return new self(self::EUR_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function gbp(): self
    {
        return new self(self::GBP_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function usd(): self
    {
        return new self(self::USD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function aud(): self
    {
        return new self(self::AUD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function bgn(): self
    {
        return new self(self::BGN_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function brl(): self
    {
        return new self(self::BRL_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function cad(): self
    {
        return new self(self::CAD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function chf(): self
    {
        return new self(self::CHF_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function cny(): self
    {
        return new self(self::CNY_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function dkk(): self
    {
        return new self(self::DKK_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function hkd(): self
    {
        return new self(self::HKD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function hrk(): self
    {
        return new self(self::HRK_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function huf(): self
    {
        return new self(self::HUF_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function idr(): self
    {
        return new self(self::IDR_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function ils(): self
    {
        return new self(self::ILS_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function inr(): self
    {
        return new self(self::INR_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function jpy(): self
    {
        return new self(self::JPY_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function kwd(): self
    {
        return new self(self::KWD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function mxn(): self
    {
        return new self(self::MXN_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function myr(): self
    {
        return new self(self::MYR_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function pln(): self
    {
        return new self(self::PLN_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function nok(): self
    {
        return new self(self::NOK_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function nzd(): self
    {
        return new self(self::NZD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function ron(): self
    {
        return new self(self::RON_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function rub(): self
    {
        return new self(self::RUB_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function sek(): self
    {
        return new self(self::SEK_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function sgd(): self
    {
        return new self(self::SGD_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function thb(): self
    {
        return new self(self::THB_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function try(): self
    {
        return new self(self::TRY_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function btc(): self
    {
        return new self(self::BTC_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function eth(): self
    {
        return new self(self::ETH_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function ltc(): self
    {
        return new self(self::LTC_CURRENCY);
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Currency\Currency
     */
    public static function xmr(): self
    {
        return new self(self::XMR_CURRENCY);
    }

}
