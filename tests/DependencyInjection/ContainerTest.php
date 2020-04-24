<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests;

use Narokishi\DependencyInjection\Container;
use Narokishi\DependencyInjection\Exception\RegisterServiceException;
use PHPUnit\Framework\TestCase;

/**
 * Class ContainerTest
 * @package Narokishi\DependencyInjection\Tests
 */
final class ContainerTest extends TestCase
{
    /**
     * @var AccessibleContainer
     */
    protected $container;

    protected function setUp()
    {
        $this->container = new AccessibleContainer;
    }

    /**
     * @return \Generator
     */
    public function registerSingleServiceDataProvider()
    {
        yield [
            'serviceClass' => ExampleService::class,
            'definition' => function () {
                return new ExampleService('exampleProperty', 'anotherExampleProperty');
            },
        ];
        yield [
            'serviceClass' => ExampleService::class,
            'definition' => function () {
                return new ExampleService('exampleProperty', 'anotherExampleProperty');
            },
            'lazyLoad' => false,
        ];
    }

    /**
     * @dataProvider registerSingleServiceDataProvider
     *
     * @param string   $serviceClass
     * @param callable $definition
     * @param bool     $lazyLoad
     */
    public function testRegisterSingleService(string $serviceClass, callable $definition, $lazyLoad = true)
    {
        $this->container->registerService($serviceClass, $definition, $lazyLoad);

        if ($lazyLoad) {
            $this->assertEmpty($this->container->getServices()->all());
        } else {
            $this->assertNotEmpty($this->container->getServices()->all());
        }

        $this->assertInstanceOf($serviceClass, $this->container->getService($serviceClass));
    }

    /**
     * @return \Generator
     */
    public function registerDependantServiceDataProvider()
    {
        yield [
            'serviceClass' => DependantExampleService::class,
            'definition' => function (Container $container) {
                return new DependantExampleService(
                    $container->getService(ExampleService::class)
                );
            },
            'bootedServicesCount' => 2,
        ];
    }

    /**
     * @dataProvider registerDependantServiceDataProvider
     *
     * @param string   $serviceClass
     * @param callable $definition
     * @param int      $bootedServicesCount
     */
    public function testRegisterDependantService(string $serviceClass, callable $definition, $bootedServicesCount)
    {
        $this->container->registerService(ExampleService::class, function () {
            return new ExampleService('exampleProperty', 'anotherExampleProperty');
        });
        $this->container->registerService($serviceClass, $definition);

        $this->assertInstanceOf($serviceClass, $this->container->getService($serviceClass));
        $this->assertCount($bootedServicesCount, $this->container->getServices()->all());
    }

    public function testDefaultLazyLoading()
    {
        $this->container->registerService(ExampleService::class, function () {
            return new ExampleService('exampleProperty', 'anotherExampleProperty');
        });
        $this->assertEmpty($this->container->getServices()->all());
    }

    public function testGetServiceOnUnregisteredServiceClass()
    {
        $this->expectException(RegisterServiceException::class);

        $this->container->getService('UnknownServiceClass');
    }
}
