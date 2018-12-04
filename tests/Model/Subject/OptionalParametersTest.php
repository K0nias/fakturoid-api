<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject;

use K0nias\FakturoidApi\Model\Subject\OptionalParameters;
use K0nias\FakturoidApi\Model\Subject\Type;
use PHPUnit\Framework\TestCase;

class OptionalParametersTest extends TestCase
{

    public function testParameters(): void
    {
        $parameters = new OptionalParameters();

        $parameters->custom('11112')
            ->type(Type::supplier())
            ->street('Vyskočilova 1461/2a')
            ->street2('Vyskočilova 1461/2b')
            ->city('Praha')
            ->zip('14000')
            ->country('Česká republika')
            ->registrationNumber('47123737')
            ->vatNumber('CZ47123737')
            ->bankAccount('456')
            ->iban('CZK123')
            ->variableSymbol('1234567890')
            ->fullName('MICROSOFT s.r.o. test')
            ->email('test@test.cz')
            ->emailCopy('test2@test.cz')
            ->phone('+420112233445')
            ->web('www.example.cz');

        $this->assertEquals([
            'custom_id' => '11112',
            'street' => 'Vyskočilova 1461/2a',
            'type' => 'supplier',
            'street2' => 'Vyskočilova 1461/2b',
            'city' => 'Praha',
            'zip' => '14000',
            'country' => 'Česká republika',
            'registration_no' => '47123737',
            'vat_no' => 'CZ47123737',
            'bank_account' => '456',
            'iban' => 'CZK123',
            'variable_symbol' => '1234567890',
            'full_name' => 'MICROSOFT s.r.o. test',
            'email' => 'test@test.cz',
            'email_copy' => 'test2@test.cz',
            'phone' => '+420112233445',
            'web' => 'www.example.cz',
        ], $parameters->getParameters());
    }

}
