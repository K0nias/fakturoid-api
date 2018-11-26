<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Exception\FilterParameter;

final class InvalidStatusException extends \K0nias\FakturoidApi\Exception\InvalidOptionParameterException
{

    /**
     * @param string[] $availableStatues
     */
    public static function create(string $givenStatus, array $availableStatues): self
    {
        return new self(parent::generateMessage($givenStatus, $availableStatues, 'Invalid status. Given: "%s". Available statues: "%s".'));
    }

}
