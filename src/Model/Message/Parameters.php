<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Message;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Parameters
{
    /**
     * @var ImmutableParameterBag
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    protected function validateEmail(string $email)
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidParameterException(sprintf('Invalid email. Given "%s"', $email));
        }
    }

    /**
     * @param string $message
     *
     * @return Parameters
     */
    public function message(string $message): self
    {
        $this->parameters = $this->parameters->set('message', $message);

        return $this;
    }

    /**
     * @param string $subject
     *
     * @return Parameters
     */
    public function subject(string $subject): self
    {
        $this->parameters = $this->parameters->set('subject', $subject);

        return $this;
    }

    /**
     * @param string $email
     *
     * @return Parameters
     */
    public function email(string $email): self
    {
        $this->validateEmail($email);

        $this->parameters = $this->parameters->set('email', $email);

        return $this;
    }

    /**
     * @param string $email
     *
     * @return Parameters
     */
    public function emailCopy(string $email): self
    {
        $this->validateEmail($email);

        $this->parameters = $this->parameters->set('email_copy', $email);

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }
}