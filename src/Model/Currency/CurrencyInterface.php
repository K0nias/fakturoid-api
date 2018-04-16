<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Currency;

interface CurrencyInterface
{
    /**
     * @return string
     */
    public function getCode(): string;
}