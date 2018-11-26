<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;

final class Parameters
{

    /** @var \K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag */
    private $parameters;

    public function __construct()
    {
        $this->parameters = new ImmutableParameterBag();
    }

    public function type(Type $type): self
    {
        $this->parameters = $this->parameters->set('type', $type->getType());

        return $this;
    }

    public function name(string $name): self
    {
        $this->parameters = $this->parameters->set('name', $name);

        return $this;
    }

    public function custom(string $id): self
    {
        $this->parameters = $this->parameters->set('custom_id', $id);

        return $this;
    }

    public function street(string $street): self
    {
        $this->parameters = $this->parameters->set('street', $street);

        return $this;
    }

    public function street2(?string $street2 = null): self
    {
        $this->parameters = $this->parameters->set('street2', $street2);

        return $this;
    }

    public function city(string $city): self
    {
        $this->parameters = $this->parameters->set('city', $city);

        return $this;
    }

    public function zip(string $zip): self
    {
        $this->parameters = $this->parameters->set('zip', $zip);

        return $this;
    }

    public function country(string $country): self
    {
        $this->parameters = $this->parameters->set('country', $country);

        return $this;
    }

    public function registrationNumber(string $registrationNumber): self
    {
        $this->parameters = $this->parameters->set('registration_no', $registrationNumber);

        return $this;
    }

    public function vatNumber(string $vatNumber): self
    {
        $this->parameters = $this->parameters->set('vat_no', $vatNumber);

        return $this;
    }

    public function bankAccount(string $bankAccount): self
    {
        $this->parameters = $this->parameters->set('bank_account', $bankAccount);

        return $this;
    }

    public function iban(string $iban): self
    {
        $this->parameters = $this->parameters->set('iban', $iban);

        return $this;
    }

    public function variableSymbol(string $variableSymbol): self
    {
        $this->parameters = $this->parameters->set('variable_symbol', $variableSymbol);

        return $this;
    }

    public function fullName(string $fullName): self
    {
        $this->parameters = $this->parameters->set('full_name', $fullName);

        return $this;
    }

    public function email(string $email): self
    {
        $this->parameters = $this->parameters->set('email', $email);

        return $this;
    }

    public function emailCopy(string $emailCopy): self
    {
        $this->parameters = $this->parameters->set('email_copy', $emailCopy);

        return $this;
    }

    public function phone(string $phone): self
    {
        $this->parameters = $this->parameters->set('phone', $phone);

        return $this;
    }

    public function web(string $web): self
    {
        $this->parameters = $this->parameters->set('web', $web);

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
