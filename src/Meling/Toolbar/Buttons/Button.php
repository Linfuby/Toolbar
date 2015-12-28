<?php
namespace Meling\Toolbar\Buttons;

class Button
{
    protected $attributes;

    protected $class;

    protected $icon;

    protected $task;

    protected $title;

    /**
     * Button constructor.
     * @param string $task
     * @param string $title
     * @param string $icon
     * @param string $class
     * @param array  $attributes
     */
    public function __construct($task, $title, $icon = '', $class = '', $checked = false, $attributes = array())
    {
        $this->task       = 'sendForm(\'' . $task . '\', \'' . $checked . '\');';
        $this->title      = $title;
        $this->icon       = $icon;
        $this->class      = $class;
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        $html = '';
        foreach ($this->attributes as $key => $value) {
            $html .= ' ' . $key . '="' . $value . '"';
        }

        return $html;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

}
