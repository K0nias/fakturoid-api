<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Line;

use K0nias\FakturoidApi\Exception\InvalidParameterException;

final class Line
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $unitPrice;
    /**
     * @var float
     */
    private $quantity;
    /**
     * @var null|string
     */
    private $unit;
    /**
     * @var float|null
     */
    private $vatRate;


    /**
     * @throws InvalidParameterException
     *
     * @param string      $name
     * @param float       $unitPrice
     * @param float       $quantity
     * @param null|string $unit
     * @param float|null  $vatRate
     */
    public function __construct(string $name, float $unitPrice, float $quantity = 1.0, ?string $unit = null, ?float $vatRate = null)
    {
        $errors = [];

        if ($unitPrice <= 0) {
            $errors[] = sprintf('Unit price must be positive float. Given: "%s".', $unitPrice);
        }

        if ($quantity <= 0) {
            $errors[] = sprintf('Quantity must be positive float. Given: "%s".', $quantity);
        }

        if (null !== $vatRate && $vatRate < 1) {
            $errors[] = sprintf('Vat rate must be positive integer. Given: "%s".', $vatRate);
        }

        if ($errors) {
            throw new InvalidParameterException(implode(' ', $errors));
        }

        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->vatRate = $vatRate;
    }

    /**
     * @return array
     */
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