<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

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
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters->getParameters();
    }

    /**
     * @param Type $type
     *
     * @return self
     */
    public function type(Type $type): self
    {
        $this->parameters->type($type);

        return $this;
    }

    /**
     * @param string $id
     *
     * @return self
     */
    public function custom(string $id): self
    {
        $this->parameters->custom($id);

        return $this;
    }

    /**
     * @param string $street
     *
     * @return self
     */
    public function street(string $street): self
    {
        $this->parameters->street($street);

        return $this;
    }

    /**
     * @param string|null $street2
     *
     * @return self
     */
    public function street2(string $street2 = null): self
    {
        $this->parameters->street2($street2);

        return $this;
    }

    /**
     * @param string $city
     *
     * @return self
     */
    public function city(string $city): self
    {
        $this->parameters->city($city);

        return $this;
    }

    /**
     * @param string $zip
     *
     * @return self
     */
    public function zip(string $zip): self
    {
        $this->parameters->zip($zip);

        return $this;
    }

    /**
     * @param string $country
     *
     * @return self
     */
    public function country(string $country): self
    {
        $this->parameters->country($country);

        return $this;
    }

    /**
     * @param string $registrationNumber
     *
     * @return self
     */
    public function registrationNumber(string $registrationNumber): self
    {
        $this->parameters->registrationNumber($registrationNumber);

        return $this;
    }

    /**
     * @param string $vatNumber
     *
     * @return self
     */
    public function vatNumber(string $vatNumber): self
    {
        $this->parameters->vatNumber($vatNumber);

        return $this;
    }

    /**
     * @param string $bankAccount
     *
     * @return self
     */
    public function bankAccount(string $bankAccount): self
    {
        $this->parameters->bankAccount($bankAccount);

        return $this;
    }

    /**
     * @param string $iban
     *
     * @return self
     */
    public function iban(string $iban): self
    {
        $this->parameters->iban($iban);

        return $this;
    }

    /**
     * @param string $variableSymbol
     *
     * @return self
     */
    public function variableSymbol(string $variableSymbol): self
    {
        $this->parameters->variableSymbol($variableSymbol);

        return $this;
    }

    /**
     * @param string $fullName
     *
     * @return self
     */
    public function fullName(string $fullName): self
    {
        $this->parameters->fullName($fullName);

        return $this;
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
     * @param string $emailCopy
     *
     * @return self
     */
    public function emailCopy(string $emailCopy): self
    {
        $this->parameters->emailCopy($emailCopy);

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return self
     */
    public function phone(string $phone): self
    {
        $this->parameters->phone($phone);

        return $this;
    }

    /**
     * @param string $web
     *
     * @return self
     */
    public function web(string $web): self
    {
        $this->parameters->web($web);

        return $this;
    }
}