<?php
namespace Meling;

class Toolbar
{
    protected $builder;

    public function __construct()
    {
        $this->builder = $this->buildBuilder();
    }

    public function buttons()
    {
        return $this->builder->buttons();
    }

    public function filters()
    {
        return $this->builder->filters();
    }

    protected function buildBuilder()
    {
        return new Toolbar\Builder();
    }
}
