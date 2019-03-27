<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\ParameterBag;

use Narokishi\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * Interface ParameterBagInterface
 * @package Narokishi\DependencyInjection\ParameterBag
 */
interface ParameterBagInterface
{
    /**
     * Truncates the bag.
     */
    public function clear();

    /**
     * Adds multiple parameters to the bag.
     *
     * @param array $parameters An array of parameters.
     */
    public function add(array $parameters);

    /**
     * Returns all of the parameters.
     *
     * @return array The parameters.
     */
    public function all(): array;

    /**
     * Returns single parameter from the bag.
     *
     * @param string $name Parameter name.
     *
     * @return mixed                      Parameter value.
     * @throws ParameterNotFoundException If the definition is not set.
     */
    public function get(string $name);

    /**
     * Removes parameter by name from the bag.
     *
     * @param string $name Parameter name.
     */
    public function remove(string $name);

    /**
     * Sets parameter in the bag.
     *
     * @param string $name  Parameter name.
     * @param mixed  $value Parameter value.
     */
    public function set(string $name, $value);

    /**
     * @param  string $name Parameter name.
     *
     * @return bool Parameter existence.
     */
    public function has(string $name): bool;
}
