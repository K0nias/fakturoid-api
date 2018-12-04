<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Message;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Parameters
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    protected function validateEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(sprintf('Invalid email. Given "%s"', $email));
        }
    }

    public function message(string $message): self
    {
        $this->parameters = $this->parameters->set('message', $message);

        return $this;
    }

    public function subject(string $subject): self
    {
        $this->parameters = $this->parameters->set('subject', $subject);

        return $this;
    }

    public function email(string $email): self
    {
        $this->validateEmail($email);

        $this->parameters = $this->parameters->set('email', $email);

        return $this;
    }

    public function emailCopy(string $email): self
    {
        $this->validateEmail($email);

        $this->parameters = $this->parameters->set('email_copy', $email);

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getAll();
    }

}
