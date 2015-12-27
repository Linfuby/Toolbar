<?php
namespace Meling;

class Toolbar
{
    protected $builder;

    /**
     * @param \PHPixie\Template $template
     */
    public function __construct($template)
    {
        $this->builder = $this->buildBuilder($template);
    }

    public function title()
    {
        return $this->builder->title();
    }

    public function buttons()
    {
        return $this->builder->buttons();
    }

    public function filters()
    {
        return $this->builder->filters();
    }

    /**
     * @param \PHPixie\Template $template
     * @return \Meling\Toolbar\Builder
     */
    protected function buildBuilder($template)
    {
        return new Toolbar\Builder($template);
    }
}
