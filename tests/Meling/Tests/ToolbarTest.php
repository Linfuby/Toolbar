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
        $slice          = new \PHPixie\Slice();
        $filesystem     = new \PHPixie\Filesystem();
        $locatorConfig  = $slice->arrayData(array('directory' => 'assets/layout'));
        $templateConfig = $slice->arrayData(array());
        $root           = $filesystem->root(dirname(dirname(dirname(__DIR__))));
        $locator        = $filesystem->buildlocator($locatorConfig, $root);
        $template       = new \PHPixie\Template($slice, $locator, $templateConfig);
        $this->toolbar  = new \Meling\Toolbar($template);
    }

    public function testBuilder()
    {
        $this->assertAttributeInstanceOf('\Meling\Toolbar\Builder', 'builder', $this->toolbar);
    }

    public function testTitle()
    {
        $title = 'Title';
        $icon  = 'icon';
        $tag   = 'h1';
        $this->toolbar->title()->set($title, $icon, $tag);
        $this->assertEquals('<h1><i class="icon"></i>&nbsp;Title</h1>', $this->toolbar->title()->render());
        $this->toolbar->title()->set($title, $icon);
        $this->assertEquals('<h2><i class="icon"></i>&nbsp;Title</h2>', $this->toolbar->title()->render());
        $this->toolbar->title()->set($title);
        $this->assertEquals('<h2>Title</h2>', $this->toolbar->title()->render());
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
