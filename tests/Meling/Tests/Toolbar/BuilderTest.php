<?php
namespace Meling\Tests\Toolbar;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @type \Meling\Toolbar\Builder
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = new \Meling\Toolbar\Builder();
    }

    public function testButton()
    {
        $this->assertInstanceOf(
            '\Meling\Toolbar\Buttons\Button', $this->builder->buildButton('Standard', 'view', 'Button', '', '', '')
        );
    }

    public function testButtons()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Buttons', $this->builder->buttons());
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Builder', $this->builder);
    }

    public function testFilter()
    {
        $this->assertInstanceOf(
            '\Meling\Toolbar\Filters\Filter', $this->builder->buildFilter('Filter1', 'filter_1', array(), null)
        );
    }

    public function testFilters()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Filters', $this->builder->filters());
    }
}
