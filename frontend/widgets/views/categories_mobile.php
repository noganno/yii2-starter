<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<ul>
	<li class="all"><a href="#">Все новости <span>&nbsp;&nbsp;(7543)</span></a></li>
	<?php foreach ($result as $key => $value) {?>
		<li><a href="<?= Url::to(['category/view', 'slug' => $value['slug']]) ?>"><?php echo $value['title'] ?></a></li>
	<?php } ?>
</ul>
