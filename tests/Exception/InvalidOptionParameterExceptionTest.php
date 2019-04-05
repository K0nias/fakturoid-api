<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Tests\Exception;

use PHPUnit\Framework\TestCase;

class InvalidOptionParameterExceptionTest extends TestCase
{

    public function testCustomMessage(): void
    {
        $exception = \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom('option 1', ['option 2', 'option 3'], 'custom message "%s", "%s"');

        $this->assertSame(
            'custom message "option 1", "option 2, option 3"',
            $exception->getMessage()
        );
    }

    public function testDefaultMessage(): void
    {
        $exception = \K0nias\FakturoidApi\Exception\InvalidOptionParameterException::createFrom('option 1', ['option 2', 'option 3']);

        $this->assertSame(
            'Invalid option. Given: "option 1". Available options: "option 2, option 3".',
            $exception->getMessage()
        );
    }

}
