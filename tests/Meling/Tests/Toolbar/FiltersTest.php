<?php
namespace Meling\Tests\Toolbar;

class FiltersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @type \Meling\Toolbar\Filters
     */
    protected $filters;

    public function setUp()
    {
        $builder       = new \Meling\Toolbar\Builder();
        $this->filters = new \Meling\Toolbar\Filters($builder);
    }

    public function testAddFilter()
    {
        $filter = new \Meling\Toolbar\Filters\Filter(
            'Группа пользователя', 'user_group', array(array('id' => 1, 'name' => 'Администраторы'))
        );
        $this->filters->addFilter(
            'Группа пользователя', 'user_group', array(array('id' => 1, 'name' => 'Администраторы'))
        );
        $this->assertEquals(array($filter), $this->filters->asArray());
    }

    public function testAsArray()
    {
        $this->assertEquals(array(), $this->filters->asArray());
    }
}
