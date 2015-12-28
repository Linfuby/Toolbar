<?php
/**
 * @var \PHPixie\Template\Renderer\Runtime $this
 * @var \Meling\Toolbar\Buttons\Button     $button
 */
$buttons = $this->get('buttons');
?>
<div class="uk-button-group">
    <?php foreach ($buttons as $button) { ?>
        <button onclick="<?= $button->getTask(); ?>return false;"
                class="uk-button <?= $button->getClass(); ?>" <?= $button->getAttributes(); ?>>
            <?php if ($button->getIcon()) { ?><i class="<?= $button->getIcon(); ?>"></i>&nbsp;<?php } ?>
            <?= $button->getTitle(); ?>
        </button>
    <?php } ?>
</div>
