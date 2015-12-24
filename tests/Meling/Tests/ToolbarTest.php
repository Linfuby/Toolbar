<?php
namespace Meling\Tests;

class ToolbarTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @type \Meling\Toolbar
     */
    protected $toolbar;

    public function setUp()
    {
        $this->toolbar = new \Meling\Toolbar();
    }

    public function testBuilder()
    {
        $this->assertAttributeInstanceOf('\Meling\Toolbar\Builder', 'builder', $this->toolbar);
    }

    public function testButtons()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Buttons', $this->toolbar->buttons());
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('\Meling\Toolbar', $this->toolbar);
    }

    public function testFilters()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Filters', $this->toolbar->filters());
    }

}
