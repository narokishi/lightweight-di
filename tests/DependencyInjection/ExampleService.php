<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests;

/**
 * Class ExampleService
 * @package Narokishi\DependencyInjection\Tests
 */
final class ExampleService
{
    /**
     * @var mixed
     */
    protected $exampleProperty;

    /**
     * @var mixed
     */
    protected $anotherExampleProperty;

    /**
     * ExampleService constructor.
     *
     * @param mixed $exampleProperty
     * @param mixed $anotherExampleProperty
     */
    public function __construct($exampleProperty, $anotherExampleProperty)
    {
        $this->exampleProperty = $exampleProperty;
        $this->anotherExampleProperty = $anotherExampleProperty;
    }

    /**
     * @return mixed
     */
    public function getExampleProperty()
    {
        return $this->exampleProperty;
    }

    /**
     * @param mixed $exampleProperty
     *
     * @return $this
     */
    public function setExampleProperty($exampleProperty): self
    {
        $this->exampleProperty = $exampleProperty;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnotherExampleProperty()
    {
        return $this->anotherExampleProperty;
    }

    /**
     * @param mixed $anotherExampleProperty
     *
     * @return $this
     */
    public function setAnotherExampleProperty($anotherExampleProperty): self
    {
        $this->anotherExampleProperty = $anotherExampleProperty;

        return $this;
    }
}
