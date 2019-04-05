<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Http\Response\Reports;

use K0nias\FakturoidApi\Http\Response\Reports\GetVatReportsResponse;
use PHPUnit\Framework\TestCase;

class GetVatReportsResponseTest extends TestCase
{

    public function testData(): void
    {
        $response = new GetVatReportsResponse((string) json_encode([
            'January' => [
                'income' => '7316.43',
                'vat' => '1482.57',
            ],
            'February' => [
                'income' => '7316.43',
                'vat' => '1482.57',
            ],
        ]));

        $this->assertSame(
            [
                'January' => [
                    'income' => '7316.43',
                    'vat' => '1482.57',
                ],
                'February' => [
                    'income' => '7316.43',
                    'vat' => '1482.57',
                ],
            ],
            $response->getReports()
        );
    }

}
