<?php
namespace Meling\Tests\Toolbar\Filters;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    protected $data    = array();

    protected $default = array();

    /**
     * @type \Meling\Toolbar\Filters\Filter
     */
    protected $filter;

    protected $itemId;

    protected $itemName;

    protected $name;

    protected $selected;

    protected $title;

    public function setUp()
    {
        $this->title    = 'Группа пользователя';
        $this->name     = 'user_group';
        $this->itemId   = 'id';
        $this->itemName = 'name';
        $this->default  = array((object)array($this->itemId => '', $this->itemName => ' - - - '));
        $this->data     = array(
            5 => (object)array($this->itemId => 5, $this->itemName => 'Администраторы'),
            4 => (object)array($this->itemId => 4, $this->itemName => 'Пользователи'),
        );
        $this->selected = 4;
        $this->filter   = new \Meling\Toolbar\Filters\Filter(
            $this->title, $this->name, $this->data, $this->selected, $this->itemId, $this->itemName
        );
    }

    public function testArray()
    {
        $this->data = array(
            array($this->itemId => 1, $this->itemName => 'Администраторы'),
            array($this->itemId => 2, $this->itemName => 'Пользователи'),
        );
        $data       = array();
        foreach ($this->data as $item) {
            $data[] = (object)$item;
        }
        $filter = new \Meling\Toolbar\Filters\Filter(
            $this->title, $this->name, $this->data, $this->selected, $this->itemId, $this->itemName
        );
        $this->assertEquals(array_merge($this->default, $data), $filter->data());
    }

    public function testClass()
    {
        $this->assertInstanceOf('\Meling\Toolbar\Filters\Filter', $this->filter);
    }

    public function testData()
    {
        $data = $this->data;
        foreach ($this->default as $key => $value) {
            $data[$key] = $value;
        }
        $this->assertEquals($data, $this->filter->data());
    }

    public function testName()
    {
        $this->assertEquals($this->name, $this->filter->name());
    }

    public function testSelected()
    {
        $this->assertEquals($this->selected, $this->filter->selected());
    }

    public function testTitle()
    {
        $this->assertEquals($this->filter->data()[$this->selected]->name, $this->filter->title());
    }

    public function testTitleEmpty()
    {
        $this->data = array(
            array($this->itemId => 1, $this->itemName => 'Администраторы'),
            array($this->itemId => 2, $this->itemName => 'Пользователи'),
        );
        $filter     = new \Meling\Toolbar\Filters\Filter(
            $this->title, $this->name, $this->data, '', $this->itemId, $this->itemName
        );
        $this->assertEquals($this->title, $filter->title());
    }
}
