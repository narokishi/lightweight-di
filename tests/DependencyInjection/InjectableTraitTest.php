<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests;

use Narokishi\DependencyInjection\Container;
use Narokishi\DependencyInjection\InjectableTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class ContainerTest
 * @package Narokishi\DependencyInjection\Tests
 */
final class InjectableTraitTest extends TestCase
{
    /**
     * @var InjectableTrait
     */
    protected $injectableTrait;

    public function setUp()
    {
        $this->injectableTrait = $this->getMockForTrait(InjectableTrait::class);
    }

    public function testTrait()
    {
        $container = new Container;

        $this->injectableTrait->setContainer($container);
        $this->assertSame($container, $this->injectableTrait->getContainer());
    }
}
