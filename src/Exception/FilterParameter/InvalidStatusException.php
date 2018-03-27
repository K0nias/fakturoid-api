<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Exception\FilterParameter;

use K0nias\FakturoidApi\Exception\FakturoidApiException;

final class InvalidStatusException extends FakturoidApiException
{
    public static function create(string $givenStatus, array $availableStatues)
    {
        return new self(sprintf('Invalid status. Given: "%s". Available statues: "%s".', $givenStatus, implode(', ', $availableStatues)));
    }
}