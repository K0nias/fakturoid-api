<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Exception;

class InvalidOptionParameterException extends \K0nias\FakturoidApi\Exception\FakturoidApiException
{

    /** @param string[] $availableOptions */
    public static function createFrom(string $givenOption, array $availableOptions, ?string $message = null): self
    {
        return new self(self::generateMessage($givenOption, $availableOptions, $message));
    }

    /** @param string[] $availableOptions */
    protected static function generateMessage(
        string $givenOption,
        array $availableOptions,
        ?string $message = null
    ): string
    {
        if ($message === null) {
            $message = 'Invalid option. Given: "%s". Available options: "%s".';
        }

        return sprintf($message, $givenOption, implode(', ', $availableOptions));
    }

}
