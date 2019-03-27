<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests;

use Narokishi\DependencyInjection\Container;
use Narokishi\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Class AccessibleContainer
 * @package Narokishi\DependencyInjection\Tests
 */
final class AccessibleContainer extends Container
{
    /**
     * @return ParameterBag
     */
    public function getServices(): ParameterBag
    {
        return $this->services;
    }

    /**
     * @return ParameterBag
     */
    public function getRegisteredServices(): ParameterBag
    {
        return $this->registeredServices;
    }
}
