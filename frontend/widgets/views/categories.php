<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!--- Все категррии -->
<h3 class="block_title">Все <strong>категории</strong></h3>
<ul class="categories">
	<?php foreach ($result as $key => $value) {?>
		<li><a href="<?= Url::to(['category/view', 'slug' => $value['slug']]) ?>"><?php echo $value['title'] ?></a></li>
	<?php } ?>

</ul>
<div class="clearfix"></div>
<!---! Все категррии ! -->
