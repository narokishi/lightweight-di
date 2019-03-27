<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests\Exception;

use Narokishi\DependencyInjection\Exception\RegisterServiceException;
use PHPUnit\Framework\TestCase;

/**
 * Class RegisterServiceExceptionTest
 * @package Narokishi\DependencyInjection\Tests\Exception
 */
final class RegisterServiceExceptionTest extends TestCase
{
    public function testConstruct()
    {
        $exception = new RegisterServiceException('className');

        $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
        $this->assertEquals(
            "You have registered a non-existent service \"className\"",
            $exception->getMessage()
        );
    }
}
