<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Subject;

use K0nias\FakturoidApi\Exception\InvalidParameterException;
use K0nias\FakturoidApi\Model\Line\Line;
use K0nias\FakturoidApi\Model\Line\LineCollection;
use K0nias\FakturoidApi\Model\Parameters\ImmutableParameterBag;
use K0nias\FakturoidApi\Model\Payment\Method as PaymentMethod;
use K0nias\FakturoidApi\Model\Subject\Id as SubjectId;

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

    /**
     * @param Type $type
     *
     * @return Parameters
     */
    public function type(Type $type): self
    {
        $this->parameters = $this->parameters->set('type', $type->getType());

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Parameters
     */
    public function name(string $name): self
    {
        $this->parameters = $this->parameters->set('name', $name);

        return $this;
    }

    /**
     * @param string $id
     *
     * @return Parameters
     */
    public function custom(string $id): self
    {
        $this->parameters = $this->parameters->set('custom_id', $id);

        return $this;
    }

    /**
     * @param string $street
     *
     * @return Parameters
     */
    public function street(string $street): self
    {
        $this->parameters = $this->parameters->set('street', $street);

        return $this;
    }

    /**
     * @param string|null $street2
     *
     * @return Parameters
     */
    public function street2(string $street2 = null): self
    {
        $this->parameters = $this->parameters->set('street2', $street2);

        return $this;
    }

    /**
     * @param string $city
     *
     * @return Parameters
     */
    public function city(string $city): self
    {
        $this->parameters = $this->parameters->set('city', $city);

        return $this;
    }

    /**
     * @param string $zip
     *
     * @return Parameters
     */
    public function zip(string $zip): self
    {
        $this->parameters = $this->parameters->set('zip', $zip);

        return $this;
    }

    /**
     * @param string $country
     *
     * @return Parameters
     */
    public function country(string $country): self
    {
        $this->parameters = $this->parameters->set('country', $country);

        return $this;
    }

    /**
     * @param string $registrationNumber
     *
     * @return Parameters
     */
    public function registrationNumber(string $registrationNumber): self
    {
        $this->parameters = $this->parameters->set('registration_no', $registrationNumber);

        return $this;
    }

    /**
     * @param string $vatNumber
     *
     * @return Parameters
     */
    public function vatNumber(string $vatNumber): self
    {
        $this->parameters = $this->parameters->set('vat_no', $vatNumber);

        return $this;
    }

    /**
     * @param string $bankAccount
     *
     * @return Parameters
     */
    public function bankAccount(string $bankAccount): self
    {
        $this->parameters = $this->parameters->set('bank_account', $bankAccount);

        return $this;
    }

    /**
     * @param string $iban
     *
     * @return Parameters
     */
    public function iban(string $iban): self
    {
        $this->parameters = $this->parameters->set('iban', $iban);

        return $this;
    }

    /**
     * @param string $variableSymbol
     *
     * @return Parameters
     */
    public function variableSymbol(string $variableSymbol): self
    {
        $this->parameters = $this->parameters->set('variable_symbol', $variableSymbol);

        return $this;
    }

    /**
     * @param string $fullName
     *
     * @return Parameters
     */
    public function fullName(string $fullName): self
    {
        $this->parameters = $this->parameters->set('full_name', $fullName);

        return $this;
    }

    /**
     * @param string $email
     *
     * @return Parameters
     */
    public function email(string $email): self
    {
        $this->parameters = $this->parameters->set('email', $email);

        return $this;
    }

    /**
     * @param string $emailCopy
     *
     * @return Parameters
     */
    public function emailCopy(string $emailCopy): self
    {
        $this->parameters = $this->parameters->set('email_copy', $emailCopy);

        return $this;
    }

    /**
     * @param string $phone
     *
     * @return Parameters
     */
    public function phone(string $phone): self
    {
        $this->parameters = $this->parameters->set('phone', $phone);

        return $this;
    }

    /**
     * @param string $web
     *
     * @return Parameters
     */
    public function web(string $web): self
    {
        $this->parameters = $this->parameters->set('web', $web);

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