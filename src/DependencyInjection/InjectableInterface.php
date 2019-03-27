<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection;

/**
 * Interface InjectableInterface
 * @package Narokishi\DependencyInjection
 */
interface InjectableInterface
{
    /**
     * @return Container
     */
    public function getContainer(): Container;

    /**
     * @param Container $container
     * @return InjectableInterface
     */
    public function setContainer(Container $container);
}
