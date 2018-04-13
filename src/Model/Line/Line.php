<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Line;

final class Line
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var int
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
     * @param string      $name
     * @param int         $unitPrice
     * @param float       $quantity
     * @param null|string $unit
     * @param float|null  $vatRate
     */
    public function __construct(string $name, int $unitPrice, float $quantity = 1.0, ?string $unit = null, ?float $vatRate = null)
    {
        // TODO: add testing for positive $quantity, $vatRate and $unitPrice

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