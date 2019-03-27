<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Exception;

/**
 * Class ParameterNotFoundException
 * @package Narokishi\DependencyInjection\Exception
 */
final class ParameterNotFoundException extends \InvalidArgumentException
{
    /**
     * ParameterNotFoundException constructor.
     *
     * @param string $parameterName Parameter name.
     */
    public function __construct(string $parameterName)
    {
        parent::__construct("You have requested a non-existent parameter \"$parameterName\"", 500);
    }
}
