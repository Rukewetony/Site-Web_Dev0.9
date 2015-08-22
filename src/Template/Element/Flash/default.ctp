<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>

<div class="alert alert-<?= h($class) ?>" role="alert">
	<?= h($message) ?>
</div>
