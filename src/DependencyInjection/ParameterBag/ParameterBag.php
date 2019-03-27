<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\ParameterBag;

use Narokishi\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * Class ParameterBag
 * @package Narokishi\DependencyInjection\ParameterBag
 */
class ParameterBag implements ParameterBagInterface
{
    /**
     * The parameters.
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Truncates the bag.
     */
    public function clear()
    {
        $this->parameters = [];
    }

    /**
     * Adds multiple parameters to the bag.
     *
     * @param array $parameters An array of parameters.
     */
    public function add(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Returns all of the parameters.
     *
     * @return array The parameters.
     */
    public function all(): array
    {
        return $this->parameters;
    }

    /**
     * Returns single parameter from the bag.
     *
     * @param string $name Parameter name.
     *
     * @return mixed                      Parameter value.
     * @throws ParameterNotFoundException When the parameter is not set.
     */
    public function get(string $name)
    {
        if (!$this->has($name)) {
            throw new ParameterNotFoundException($name);
        }

        return $this->parameters[$name];
    }

    /**
     * Removes parameter by name from the bag.
     *
     * @param string $name Parameter name.
     */
    public function remove(string $name)
    {
        unset($this->parameters[$name]);
    }

    /**
     * Sets parameter in the bag.
     *
     * @param string $name  Parameter name.
     * @param mixed  $value Parameter value.
     */
    public function set(string $name, $value)
    {
        $this->parameters[$name] = $value;
    }

    /**
     * @param  string $name Parameter name.
     *
     * @return bool Parameter existence.
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->parameters);
    }
}
