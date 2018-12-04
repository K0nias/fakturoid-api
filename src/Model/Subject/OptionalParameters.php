<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

final class OptionalParameters
{

    /** @var \K0nias\FakturoidApi\Model\Subject\Parameters */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new Parameters();
    }

    /**
     * @return mixed[]
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

    public function type(Type $type): self
    {
        $this->parameters->type($type);

        return $this;
    }

    public function custom(string $id): self
    {
        $this->parameters->custom($id);

        return $this;
    }

    public function street(string $street): self
    {
        $this->parameters->street($street);

        return $this;
    }

    public function street2(?string $street2 = null): self
    {
        $this->parameters->street2($street2);

        return $this;
    }

    public function city(string $city): self
    {
        $this->parameters->city($city);

        return $this;
    }

    public function zip(string $zip): self
    {
        $this->parameters->zip($zip);

        return $this;
    }

    public function country(string $country): self
    {
        $this->parameters->country($country);

        return $this;
    }

    public function registrationNumber(string $registrationNumber): self
    {
        $this->parameters->registrationNumber($registrationNumber);

        return $this;
    }

    public function vatNumber(string $vatNumber): self
    {
        $this->parameters->vatNumber($vatNumber);

        return $this;
    }

    public function bankAccount(string $bankAccount): self
    {
        $this->parameters->bankAccount($bankAccount);

        return $this;
    }

    public function iban(string $iban): self
    {
        $this->parameters->iban($iban);

        return $this;
    }

    public function variableSymbol(string $variableSymbol): self
    {
        $this->parameters->variableSymbol($variableSymbol);

        return $this;
    }

    public function fullName(string $fullName): self
    {
        $this->parameters->fullName($fullName);

        return $this;
    }

    public function email(string $email): self
    {
        $this->parameters->email($email);

        return $this;
    }

    public function emailCopy(string $emailCopy): self
    {
        $this->parameters->emailCopy($emailCopy);

        return $this;
    }

    public function phone(string $phone): self
    {
        $this->parameters->phone($phone);

        return $this;
    }

    public function web(string $web): self
    {
        $this->parameters->web($web);

        return $this;
    }

}
