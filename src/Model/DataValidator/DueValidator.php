<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\DataValidator;

final class DueValidator
{

    public static function validate(int $due): void
    {
        if ($due < 1) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf(
                'Due must be positive integer greater than 0. Given: %s',
                $due
            ));
        }
    }

}
