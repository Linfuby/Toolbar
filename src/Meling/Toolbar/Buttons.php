<?php
namespace Meling\Toolbar;

class Buttons
{
    /**
     * @type Builder
     */
    protected $builder;

    /**
     * @type array
     */
    protected $buttons = array();

    /**
     * Buttons constructor.
     *
     * @param \Meling\Toolbar\Builder     $builder
     * @param \PHPixie\Template\Container $container
     */
    public function __construct(\Meling\Toolbar\Builder $builder, \PHPixie\Template\Container $container)
    {
        $this->builder   = $builder;
        $this->container = $container;
    }

    public function add($task, $title, $icon = '', $class = '', $attributes = array())
    {
        $this->buttons[] = $this->builder->buildButton($task, $title, $icon, $class, $attributes);
    }

    public function render()
    {
        $this->container->set('buttons', $this->buttons);
        return $this->container->render();
    }

    public function addCreate(
        $task = 'create',
        $title = 'Создать',
        $icon = 'uk-icon-plus',
        $class = 'uk-button-primary',
        $attributes = array()
    )
    {
        $this->buttons[] = $this->builder->buildButton($task, $title, $icon, $class, $attributes);
    }

    public function addDelete(
        $task = 'delete',
        $title = 'Удалить',
        $icon = 'uk-icon-trash',
        $class = 'uk-text-danger',
        $attributes = array()
    )
    {
        $this->buttons[] = $this->builder->buildButton($task, $title, $icon, $class, $attributes);
    }

    public function addSave(
        $task = 'save',
        $title = 'Сохранить',
        $icon = 'uk-icon-save',
        $class = 'uk-button-success',
        $attributes = array()
    )
    {
        $this->buttons[] = $this->builder->buildButton($task, $title, $icon, $class, $attributes);
    }

    public function addApply(
        $task = 'apply',
        $title = 'Применить',
        $icon = 'uk-icon-save',
        $class = 'uk-text-success',
        $attributes = array()
    ) {
        $this->buttons[] = $this->builder->buildButton($task, $title, $icon, $class, $attributes);
    }

}
