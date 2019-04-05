<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\DataValidator;

final class MonthsPeriodValidator
{

    public static function validate(int $monthsPeriod): void
    {
        if ($monthsPeriod < 1) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf(
                'Months period must be positive integer greater than 0. Given: %s',
                $monthsPeriod
            ));
        }
    }

}
