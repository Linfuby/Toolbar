<?php
namespace Meling\Toolbar\Filters;

class Filter
{
    protected $data;

    protected $name;

    protected $selected;

    protected $title;

    /**
     * Filter constructor.
     * @param        $title
     * @param        $name
     * @param        $data
     * @param        $selected
     * @param string $itemId
     * @param string $itemName
     */
    public function __construct($title, $name, $data, $selected = null, $itemId = 'id', $itemName = 'name')
    {
        $this->title    = $title;
        $this->name     = $name;
        $this->itemId   = $itemId;
        $this->itemName = $itemName;
        $this->data     = array(0 => ' - - - ');
        $this->selected = 0;
        if(is_array($data)) {
            foreach($data as $item) {
                if(is_object($item)) {
                    $this->data[$item->{$this->itemId}] = $item->{$this->itemName};
                    if((string)$item->{$this->itemId} === (string)$selected) {
                        $this->selected = $item->{$this->itemId};
                    }
                } elseif(is_array($item)) {
                    $this->data[$item[$this->itemId]] = $item[$this->itemName];
                    if(isset($item[$this->itemId]) && (string)$item[$this->itemId] === (string)$selected) {
                        $this->selected = $item[$this->itemId];
                    }
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->{$this->itemId};
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    public function selected()
    {
        return $this->selected;
    }

    public function title()
    {
        return !$this->selected ? $this->title : $this->data[$this->selected];
    }

}
