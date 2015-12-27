<?php
namespace Meling\Tests\Toolbar;

class ButtonsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @type \Meling\Toolbar\Buttons
     */
    protected $buttons;

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
        $this->buttons = new \Meling\Toolbar\Buttons($builder);
    }

    public function testAdd()
    {
        $button = new \Meling\Toolbar\Buttons\Standard('view', 'Просмотр', null, null, null);
        $this->buttons->add('view', 'Просмотр');
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddApply()
    {
        $button = new \Meling\Toolbar\Buttons\Standard(
            'apply', 'Сохранить', 'uk-icon-check', 'uk-button-primary', null
        );
        $this->buttons->addApply();
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddCancel()
    {
        $button = new \Meling\Toolbar\Buttons\Standard(
            'default', 'Отменить', 'uk-icon-arrow-left', null, null
        );
        $this->buttons->addCancel();
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddDelete()
    {
        $button = new \Meling\Toolbar\Buttons\Standard(
            'delete', 'Удалить', 'uk-icon-trash', 'uk-button-danger',
            'Вы действительно хотите совершить данное действие?'
        );
        $this->buttons->addDelete();
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddModal()
    {
        $button = new \Meling\Toolbar\Buttons\Modal(
            'Confirm', 'Подтвердить', null, null, true
        );
        $this->buttons->addModal('Confirm', 'Подтвердить');
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddNew()
    {
        $button = new \Meling\Toolbar\Buttons\Standard(
            'create', 'Создать', 'uk-icon-plus', 'uk-button-primary', null
        );
        $this->buttons->addNew();
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAddSave()
    {
        $button = new \Meling\Toolbar\Buttons\Standard(
            'save', 'Сохранить и закрыть', 'uk-icon-check', null, null
        );
        $this->buttons->addSave();
        $this->assertEquals(array($button), $this->buttons->asArray());
    }

    public function testAsArray()
    {
        $this->assertEquals(array(), $this->buttons->asArray());
    }
}
