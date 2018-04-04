<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Exception\FilterParameter;

use K0nias\FakturoidApi\Exception\InvalidOptionParameterException;

final class InvalidStatusException extends InvalidOptionParameterException
{
    public static function create(string $givenStatus, array $availableStatues)
    {
        return new self(parent::generateMessage($givenStatus, $availableStatues, 'Invalid status. Given: "%s". Available statues: "%s".'));
    }
}