<?php
declare(strict_types = 1);

namespace Narokishi\DependencyInjection\Tests\ParameterBag;

use Narokishi\DependencyInjection\Exception\ParameterNotFoundException;
use Narokishi\DependencyInjection\ParameterBag\ParameterBag;
use PHPUnit\Framework\TestCase;

/**
 * Class ParameterBagTest
 * @package Narokishi\DependencyInjection\Tests\ParameterBag
 */
final class ParameterBagTest extends TestCase
{
    /**
     * @var ParameterBag
     */
    protected $parameterBag;

    public function setUp()
    {
        $this->parameterBag = new ParameterBag;
    }

    public function testSet()
    {
        $this->parameterBag->set('has', 'value');

        $this->assertTrue($this->parameterBag->has('has'));
    }

    public function testGet()
    {
        $value = 'value';
        $this->parameterBag->set('has', $value);

        $this->assertEquals($value, $this->parameterBag->get('has'));
    }

    public function testGetOffset()
    {
        $this->expectException(ParameterNotFoundException::class);

        $this->parameterBag->get('has');
    }

    public function testAdd()
    {
        $this->parameterBag->add([
            'has' => 'value',
            'alsoHas' => 'secondValue',
        ]);

        $this->assertTrue($this->parameterBag->has('has'));
        $this->assertTrue($this->parameterBag->has('alsoHas'));
    }

    public function testAll()
    {
        $values = [
            'has' => 'value',
            'alsoHas' => 'secondValue',
        ];

        $this->parameterBag->add($values);
        $this->assertEquals($values, $this->parameterBag->all());
    }

    public function testHas()
    {
        $this->parameterBag->set('has', 'value');

        $this->assertTrue($this->parameterBag->has('has'));
        $this->assertFalse($this->parameterBag->has('alsoHas'));
    }

    public function testClear()
    {
        $this->parameterBag->set('has', 'value');
        $this->parameterBag->set('alsoHas', 'secondValue');

        $this->assertTrue($this->parameterBag->has('has'));
        $this->assertTrue($this->parameterBag->has('alsoHas'));

        $this->parameterBag->clear();

        $this->assertFalse($this->parameterBag->has('has'));
        $this->assertFalse($this->parameterBag->has('alsoHas'));
    }

    public function testRemove()
    {
        $this->parameterBag->set('has', 'value');
        $this->parameterBag->set('alsoHas', 'secondValue');

        $this->assertTrue($this->parameterBag->has('has'));
        $this->assertTrue($this->parameterBag->has('alsoHas'));

        $this->parameterBag->remove('has');

        $this->assertFalse($this->parameterBag->has('has'));
        $this->assertTrue($this->parameterBag->has('alsoHas'));
    }
}

