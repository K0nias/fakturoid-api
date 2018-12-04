<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

final class VatPriceMode
{

    public const MODE_WITHOUT_VAT = 'without_vat';
    public const MODE_WITH_VAT = 'with_vat';

    private const AVAILABLE_MODES = [
        self::MODE_WITHOUT_VAT,
        self::MODE_WITH_VAT,
    ];

    /** @var string */
    private $mode;

    public function __construct(string $mode)
    {
        $mode = strtolower($mode);

        if ( ! in_array($mode, self::AVAILABLE_MODES)) {
            throw \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom($mode, self::AVAILABLE_MODES);
        }

        $this->mode = $mode;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public static function withVat(): self
    {
        return new self(self::MODE_WITH_VAT);
    }

    public static function withoutVat(): self
    {
        return new self(self::MODE_WITHOUT_VAT);
    }

}
