<?php
namespace Meling\Toolbar;

class Title
{
    protected $container;
    protected $builder;
    protected $title;
    protected $icon;
    protected $tag;

    /**
     * Title constructor.
     *
     * @param \Meling\Toolbar\Builder     $builder
     * @param \PHPixie\Template\Container $container
     */
    public function __construct(\Meling\Toolbar\Builder $builder, \PHPixie\Template\Container $container)
    {
        $this->builder   = $builder;
        $this->container = $container;
    }

    public function render()
    {
        $this->container->set('title', $this->title);
        $this->container->set('icon', $this->icon);
        $this->container->set('tag', $this->tag);
        return $this->container->render();
    }

    public function set($title, $icon = '', $tag = 'h2')
    {
        $this->title = $title;
        $this->icon  = $icon;
        $this->tag   = $tag;
    }

}
