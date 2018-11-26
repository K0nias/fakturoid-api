<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Model\Subject;

use K0nias\FakturoidApi\Model\Subject\Parameters;
use K0nias\FakturoidApi\Model\Subject\Type;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{

    /** @return string[] */
    public function getFullParametersData(): array
    {
        return [
            'name' => 'MICROSOFT s.r.o.',
            'type' => 'supplier',
            'custom_id' => '11112',
            'street' => 'Vyskočilova 1461/2a',
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
        ];
    }

    public function testParameters(): void
    {
        $parameters = new Parameters();

        $parameters->name('MICROSOFT s.r.o.')
            ->type(Type::supplier())
            ->custom('11112')
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

        $testedData = $this->getFullParametersData();
        $originalData = $parameters->getParameters();

        $this->assertEquals($testedData, $originalData);
    }

}
