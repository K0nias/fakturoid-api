<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Line;

final class Line
{

    /** @var string */
    private $name;

    /** @var float */
    private $unitPrice;

    /** @var float */
    private $quantity;

    /** @var string|null */
    private $unit;

    /** @var float|null */
    private $vatRate;

    public function __construct(string $name, float $unitPrice, float $quantity = 1.0, ?string $unit = null, ?float $vatRate = null)
    {
        $errors = [];

        if ($unitPrice < 0) {
            $errors[] = sprintf('Unit price must be positive float. Given: "%s".', $unitPrice);
        }

        if ($quantity <= 0) {
            $errors[] = sprintf('Quantity must be positive float. Given: "%s".', $quantity);
        }

        if ($vatRate !== null && $vatRate < 1) {
            $errors[] = sprintf('Vat rate must be positive integer. Given: "%s".', $vatRate);
        }

        if ($errors) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(implode(' ', $errors));
        }

        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->vatRate = $vatRate;
    }

    /** @return mixed[] [name, quantity, unit_price, ?unit_name, ?vat_rate] */
    public function getData(): array
    {
        $data = [
            'name' => $this->name,
            'quantity' => $this->quantity,
            'unit_price' => $this->unitPrice,
        ];

        if ($this->unit) {
            $data['unit_name'] = $this->unit;
        }

        if ($this->vatRate) {
            $data['vat_rate'] = $this->vatRate;
        }

        return $data;
    }

}
