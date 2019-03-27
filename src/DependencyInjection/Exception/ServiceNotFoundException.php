<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Exception;

/**
 * Class ServiceNotFoundException
 * @package Narokishi\DependencyInjection\Exception
 */
final class ServiceNotFoundException extends \InvalidArgumentException
{
    /**
     * ServiceNotFoundException constructor.
     *
     * @param string $className Class name.
     */
    public function __construct(string $className)
    {
        parent::__construct("You have requested a non-existent service \"$className\"", 500);
    }
}