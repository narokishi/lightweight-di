<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection;

/**
 * Trait InjectableTrait
 * @package Narokishi\DependencyInjection
 */
trait InjectableTrait
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }

    /**
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
