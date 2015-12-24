<?php
namespace Meling\Toolbar\Buttons;

class Button
{
    protected $buttonClass;

    protected $check;

    protected $iconClass;

    protected $task;

    protected $title;

    /**
     * Button constructor.
     * @param $task
     * @param $title
     * @param $iconClass
     * @param $buttonClass
     * @param $check
     */
    public function __construct($task, $title, $iconClass, $buttonClass, $check)
    {
        $this->task        = $task;
        $this->title       = $title;
        $this->iconClass   = $iconClass;
        $this->buttonClass = $buttonClass;
        $this->check       = $check;
    }

    public function render()
    {
        $iconClass = null;
        if ($this->iconClass) {
            $iconClass = '<i class="' . $this->iconClass . '"></i>&nbsp;';
        }

        return '<button class="uk-button ' . $this->buttonClass . '" onclick="return sendForm(\'' . $this->task . '\', \'' . $this->check . '\');">' . $iconClass . $this->title . '</button>';
    }

}
