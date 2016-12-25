<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!--- Популярные теги -->
    <h3 class="block_title">Популярные <strong>теги</strong></h3>
    <ul class="taglist">
		<?php foreach ($result as $item) { ?>
        <li><a href="/article/tags/<?= $item['name'] ?>"><?= $item['name'] ?></a></li>
		<?php } ?>
    </ul>
