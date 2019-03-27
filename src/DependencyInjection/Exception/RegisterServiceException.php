<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Exception;

/**
 * Class RegisterServiceException
 * @package Narokishi\DependencyInjection\Exception
 */
final class RegisterServiceException extends \InvalidArgumentException
{
    /**
     * RegisterServiceException constructor.
     *
     * @param string $className Class name.
     */
    public function __construct(string $className)
    {
        parent::__construct("You have registered a non-existent service \"$className\"", 500);
    }
}
