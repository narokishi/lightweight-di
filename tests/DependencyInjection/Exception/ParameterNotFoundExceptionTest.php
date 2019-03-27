<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests\Exception;

use Narokishi\DependencyInjection\Exception\ParameterNotFoundException;
use PHPUnit\Framework\TestCase;

/**
 * Class ParameterNotFoundExceptionTest
 * @package Narokishi\DependencyInjection\Tests\Exception
 */
final class ParameterNotFoundExceptionTest extends TestCase
{
    public function testConstruct()
    {
        $exception = new ParameterNotFoundException('parameterName');

        $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
        $this->assertEquals(
            "You have requested a non-existent parameter \"parameterName\"",
            $exception->getMessage()
        );
    }
}
