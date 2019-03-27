<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests\Exception;

use Narokishi\DependencyInjection\Exception\ServiceNotFoundException;
use PHPUnit\Framework\TestCase;

/**
 * Class ServiceNotFoundExceptionTest
 * @package Narokishi\DependencyInjection\Tests\Exception
 */
final class ServiceNotFoundExceptionTest extends TestCase
{
    public function testConstruct()
    {
        $exception = new ServiceNotFoundException('className');

        $this->assertInstanceOf(\InvalidArgumentException::class, $exception);
        $this->assertEquals(
            "You have requested a non-existent service \"className\"",
            $exception->getMessage()
        );
    }
}
