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
     * Filters constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function add($task, $title, $iconClass = '', $buttonClass = '', $check = false)
    {
        $this->append('standard', $task, $title, $iconClass, $buttonClass, $check);
    }

    public function addApply($title = 'Сохранить', $iconClass = 'uk-icon-check', $buttonClass = 'uk-button-primary')
    {
        $this->append('standard', 'apply', $title, $iconClass, $buttonClass, false);
    }

    public function addCancel($title = 'Отменить', $iconClass = 'uk-icon-arrow-left', $buttonClass = '')
    {
        $this->append('standard', 'default', $title, $iconClass, $buttonClass, false);
    }

    public function addDelete($title = 'Удалить', $iconClass = 'uk-icon-trash', $buttonClass = 'uk-button-danger')
    {
        $this->append(
            'standard', 'delete', $title, $iconClass, $buttonClass, 'Вы действительно хотите совершить данное действие?'
        );
    }

    public function addModal($task, $title, $iconClass = '', $buttonClass = '', $check = true)
    {
        $this->append('modal', $task, $title, $iconClass, $buttonClass, $check);
    }

    public function addNew($title = 'Создать', $iconClass = 'uk-icon-plus', $buttonClass = 'uk-button-primary')
    {
        $this->append('standard', 'create', $title, $iconClass, $buttonClass, false);
    }

    public function addSave($title = 'Сохранить и закрыть', $iconClass = 'uk-icon-check', $buttonClass = '')
    {
        $this->append('standard', 'save', $title, $iconClass, $buttonClass, false);
    }

    public function asArray()
    {
        return $this->buttons;
    }

    protected function append($type, $task, $title, $iconClass, $buttonClass, $check)
    {
        $this->buttons[] = $this->builder->buildButton($type, $task, $title, $iconClass, $buttonClass, $check);
    }

}
