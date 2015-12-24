<?php
namespace Meling\Toolbar;

class Builder
{
    protected $instances = array();

    /**
     * Builder constructor.
     */
    public function __construct()
    {
    }

    public function buildButton($type, $task, $title, $iconClass, $buttonClass, $check)
    {
        $class = '\Meling\Toolbar\Buttons\\' . ucfirst($type);

        return new $class($task, $title, $iconClass, $buttonClass, $check);
    }

    public function buildFilter($title, $name, $data, $selected = null, $itemId = 'id', $itemName = 'name')
    {
        return new Filters\Filter($title, $name, $data, $selected, $itemId, $itemName);
    }

    /**
     * @return Buttons
     */
    public function buttons()
    {
        return $this->instance('buttons');
    }

    /**
     * @return Filters
     */
    public function filters()
    {
        return $this->instance('filters');
    }

    protected function buildButtons()
    {
        return new Buttons($this);
    }

    protected function buildFilters()
    {
        return new Filters($this);
    }

    protected function instance($name)
    {
        if (!array_key_exists($name, $this->instances)) {
            $method                 = 'build' . ucfirst($name);
            $this->instances[$name] = $this->$method();
        }

        return $this->instances[$name];
    }

}
