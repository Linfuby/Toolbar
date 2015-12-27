<?php
namespace Meling\Toolbar\Buttons;

class Button
{
    protected $title;
    protected $task;
    protected $icon;
    protected $class;
    protected $attributes;


    /**
     * Button constructor.
     *
     * @param string $task
     * @param string $title
     * @param string $icon
     * @param string $class
     * @param array  $attributes
     */
    public function __construct($task, $title, $icon = '', $class = '', $attributes = array())
    {
        $this->task       = 'sendForm(' . $task . ');';
        $this->title      = $title;
        $this->icon       = $icon;
        $this->class      = $class;
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    public function getAttributes()
    {
        return http_build_str($this->attributes);
    }

}
