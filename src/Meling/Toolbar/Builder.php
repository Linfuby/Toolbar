<?php
namespace Meling\Toolbar;

class Builder
{
    protected $instances = array();
    protected $template;

    /**
     * Builder constructor.
     *
     * @param \PHPixie\Template $template
     */
    public function __construct(\PHPixie\Template $template)
    {
        $this->template = $template;
    }

    public function buildButton($task, $title, $icon = '', $class = '', $attributes = array())
    {
        return new Buttons\Button($task, $title, $icon, $class, $attributes);
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

    /**
     * @return Title
     */
    public function title()
    {
        return $this->instance('title');
    }

    protected function buildButtons()
    {
        return new Buttons($this);
    }

    protected function buildTitle()
    {
        return new Title($this, $this->template->get('title'));
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
