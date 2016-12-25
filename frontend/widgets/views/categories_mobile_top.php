<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<ul>
	<?php foreach ($result as $key => $value) {
			if($value['parent_id']) continue;
		?>
		<li><a href="<?= Url::to(['category/view', 'slug' => $value['slug'], 'sort' => 'top']) ?>"><?php echo $value['title'] ?> <span>&nbsp;&nbsp;(<?php echo $value['count'] ?>)</span></a></li>
	<?php } ?>
</ul>
