<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Message;

final class OptionalParameters
{

    /** @var \K0nias\FakturoidApi\Model\Message\Parameters */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }


    public function email(string $email): self
    {
        $this->parameters->email($email);

        return $this;
    }

    public function emailCopy(string $email): self
    {
        $this->parameters->emailCopy($email);

        return $this;
    }

    public function subject(string $subject): self
    {
        $this->parameters->subject($subject);

        return $this;
    }

    public function message(string $message): self
    {
        $this->parameters->message($message);

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

}
