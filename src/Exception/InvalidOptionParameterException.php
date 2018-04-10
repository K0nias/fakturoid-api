<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Exception;

class InvalidOptionParameterException extends FakturoidApiException
{

    /**
     * @param string      $givenOption
     * @param array       $availableOptions
     * @param null|string $message
     *
     * @return InvalidOptionParameterException
     */
    public static function createFrom(string $givenOption, array $availableOptions, ?string $message = null): self
    {
        return new self(self::generateMessage($givenOption, $availableOptions, $message));
    }

    /**
     * @param string      $givenOption
     * @param array       $availableOptions
     * @param string|null $message
     *
     * @return string
     */
    public static function generateMessage(string $givenOption, array $availableOptions, ?string $message = 'Invalid option. Given: "%s". Available options: "%s".'): string
    {
        return sprintf($message, $givenOption, implode(', ', $availableOptions));
    }
}