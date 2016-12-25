<?php
	use yii\helpers\Url;

?>
<div class="hover">
	<ul class="social">
		<li><a href="http://www.facebook.com/share.php?u=<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>&title=<?php echo $item['title'] ?>"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://plus.google.com/share?url=<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><i class="fa fa-plus"></i></a></li>
		<li><a href="http://twitter.com/home?status=<?php echo $item['title'] ?>+<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><i class="fa fa-twitter"></i></a></li>
		<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>&title=<?php echo $item['title'] ?>&source=[SOURCE/DOMAIN]"><i class="fa fa-linkedin"></i></a></li>
	</ul>
	<div class="clearfix"></div>
</div>