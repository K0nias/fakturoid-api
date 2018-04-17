<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Message;

final class OptionalParameters
{

    /**
     * @var Parameters
     */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }


    /**
     * @param string $email
     *
     * @return self
     */
    public function email(string $email): self
    {
        $this->parameters->email($email);

        return $this;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function emailCopy(string $email): self
    {
        $this->parameters->emailCopy($email);

        return $this;
    }

    /**
     * @param string $subject
     *
     * @return self
     */
    public function subject(string $subject): self
    {
        $this->parameters->subject($subject);

        return $this;
    }

    /**
     * @param string $message
     *
     * @return self
     */
    public function message(string $message): self
    {
        $this->parameters->message($message);

        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }
}