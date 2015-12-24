<?php
namespace Meling\Toolbar\Buttons;

class Modal extends Button
{
    public function render()
    {
        $iconClass = null;
        if ($this->iconClass) {
            $iconClass = '<i class="' . $this->iconClass . '"></i>&nbsp;';
        }

        return '<button class="uk-button ' . $this->buttonClass . '" data-uk-modal="{target: \'#' . $this->task . '\'}">' . $iconClass . $this->title . '</button>';
    }
}