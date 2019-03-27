<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection;

/**
 * Container class for services.
 *
 * Class Container
 * @package Narokishi\DependencyInjectio
 */
class Container
{
    /**
     * Already booted services.
     *
     * @var ParameterBag\ParameterBag
     */
    protected $services;

    /**
     * Service constructor definitions.
     *
     * @var ParameterBag\ParameterBag
     */
    protected $registeredServices;

    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->services = new ParameterBag\ParameterBag;
        $this->registeredServices = new ParameterBag\ParameterBag;
    }

    /**
     * Registers a new service without booting it.
     *
     * @param string   $serviceClass The name of the class with namespace.
     * @param callable $definition   Service constructor definition.
     * @param bool     $lazyLoad     Decides if class shouldn't be booted immediately.
     */
    public function registerService(string $serviceClass, callable $definition, $lazyLoad = true)
    {
        $this->registeredServices->set($serviceClass, $definition);

        if (!$lazyLoad && !$this->services->has($serviceClass)) {
            $this->buildService($serviceClass);
        }
    }

    /**
     * @param string $serviceClass The name of the class with namespace.
     *
     * @return mixed The service.
     */
    public function getService(string $serviceClass)
    {
        if ($this->services->has($serviceClass)) {
            return $this->services->get($serviceClass);
        }

        return $this->buildService($serviceClass);
    }

    /**
     * Builds the service with already registered definition.
     *
     * @param string $serviceClass The name of the class with namespace.
     *
     * @return mixed                              The service.
     * @throws Exception\RegisterServiceException When the definition is not registered.
     */
    protected function buildService(string $serviceClass)
    {
        $service = $this->getRegisteredService($serviceClass)($this);

        $this->addService($serviceClass, $service);

        return $service;
    }

    /**
     * Returns service constructor definition.
     *
     * @param string $serviceClass The name of the class with namespace.
     *
     * @return mixed                              The service constructor definition.
     * @throws Exception\RegisterServiceException When the definition is not registered.
     */
    protected function getRegisteredService(string $serviceClass)
    {
        if (!$this->registeredServices->has($serviceClass)) {
            throw new Exception\RegisterServiceException($serviceClass);
        }

        return $this->registeredServices->get($serviceClass);
    }

    /**
     * Add a newly booted service to the bag.
     *
     * @param string $serviceClass The name of the class with namespace.
     * @param mixed  $service      Already booted service.
     */
    protected function addService(string $serviceClass, $service)
    {
        $this->services->set($serviceClass, $service);
    }
}
