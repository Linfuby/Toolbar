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
        $slice          = new \PHPixie\Slice();
        $filesystem     = new \PHPixie\Filesystem();
        $locatorConfig  = $slice->arrayData(array('directory' => '/layout/'));
        $templateConfig = $slice->arrayData(array());
        $root           = $filesystem->root(__DIR__);
        $locator        = $filesystem->buildlocator($locatorConfig, $root);
        $template       = new \PHPixie\Template($slice, $locator, $templateConfig);
        $builder        = new \Meling\Toolbar\Builder($template);
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
