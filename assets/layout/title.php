<?php
/**
 * @var \PHPixie\Template\Renderer\Runtime $this
 */
$icon  = $this->get('icon');
$title = $this->get('title');
$tag   = $this->get('tag', 'h2');
?>
<<?= $tag; ?>><?php if ($icon) { ?><i class="<?= $icon; ?>"></i>&nbsp;<?php } ?><?= $title; ?></<?= $tag; ?>>