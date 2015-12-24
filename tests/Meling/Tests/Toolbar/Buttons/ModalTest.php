<?php
namespace Meling\Tests\Toolbar\Buttons;

class ModalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @type \Meling\Toolbar\Buttons\Button
     */
    protected $button;

    protected $buttonClass;

    protected $check;

    protected $iconClass;

    protected $task;

    protected $title;

    public function setUp()
    {
        $this->task        = 'Confirm';
        $this->title       = 'Подтвердить';
        $this->iconClass   = null;
        $this->buttonClass = '';
        $this->check       = '';
        $this->button      = new \Meling\Toolbar\Buttons\Modal(
            $this->task, $this->title, $this->iconClass, $this->buttonClass, $this->check
        );
    }

    public function testButtonClass()
    {
        $this->assertAttributeEquals($this->buttonClass, 'buttonClass', $this->button);
    }

    public function testCheck()
    {
        $this->assertAttributeEquals($this->check, 'check', $this->button);
    }

    public function testIconClass()
    {
        $this->assertAttributeEquals($this->iconClass, 'iconClass', $this->button);
    }

    public function testRender()
    {
        $html = "<button class=\"uk-button {$this->buttonClass}\" data-uk-modal=\"{target: '#{$this->task}'}\">";
        if ($this->iconClass) {
            $html .= "<i class=\"{$this->iconClass}\"></i>&nbsp;";
        }
        $html .= "{$this->title}</button>";
        $this->assertEquals(
            $html, $this->button->render()
        );
    }

    public function testTask()
    {
        $this->assertAttributeEquals($this->task, 'task', $this->button);
    }

    public function testTitle()
    {
        $this->assertAttributeEquals($this->title, 'title', $this->button);
    }
}
