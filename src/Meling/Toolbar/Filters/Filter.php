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
        $item           = (object)array(
            $itemId   => '',
            $itemName => ' - - - ',
        );
        $this->data     = array($item);
        $this->selected = $item->$itemId;
        if (is_array($data)) {
            foreach ($data as $item) {
                if (is_object($item)) {
                    $this->data[] = $item;
                    if ((string)$item->$itemId === (string)$selected) {
                        $this->selected = $item->$itemId;
                    }
                } elseif (is_array($item)) {
                    $this->data[] = (object)$item;
                    if (isset($item[$itemId]) && (string)$item[$itemId] === (string)$selected) {
                        $this->selected = $item[$itemId];
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
        return $this->title;
    }

}
