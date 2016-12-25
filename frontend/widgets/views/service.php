<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<nav class='main-menu'>
	<ul>
		<?php foreach ($result as $item) {?>
		<li>
			<a href='<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>'>
				<span class='menu-icon' style='background-image:url(<?= $item['thumbnail_base_url'].'/'. $item['thumbnail_path'] ?>)'></span>
				<span class='m-text'><?= $item['title'] ?></span>
			</a>
		</li>
		<?php } ?>
	</ul>
</nav>
