<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests;

/**
 * Class DependantExampleService
 * @package Narokishi\DependencyInjection\Tests
 */
final class DependantExampleService
{
    /**
     * @var ExampleService
     */
    protected $exampleService;

    /**
     * DependantExampleService constructor.
     *
     * @param ExampleService $exampleService
     */
    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    /**
     * @return ExampleService
     */
    public function getExampleService(): ExampleService
    {
        return $this->exampleService;
    }
}
