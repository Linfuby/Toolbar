<?php
namespace Meling\Toolbar;

class Filters
{
    /**
     * @type Builder
     */
    protected $builder;

    /**
     * @type array
     */
    protected $filters = array();

    /**
     * Filters constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function addFilter($title, $name, $data, $selected = null, $itemId = 'id', $itemName = 'name')
    {
        $this->filters[] = $this->builder->buildFilter($title, $name, $data, $selected, $itemId, $itemName);
    }

    public function asArray()
    {
        return $this->filters;
    }

}
