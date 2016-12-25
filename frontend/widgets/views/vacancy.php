<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<div class='articles-list list-1'>
	<ul>
		<?php foreach ($result as $item) {?>
		<li>
			<div class='after-2'>
				<a class='img-cont' href='<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>'>
					<img width="50" src='<?= $item['thumbnail_base_url'].'/'. $item['thumbnail_path'] ?>'>
				</a>
				<!-- img-cont end -->
				<div class='overflowed'>
					<a class='a-title' href='<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>'>
						<?= $item['title'] ?>
					</a>
				</div>
			</div>
			<div class='a-desc'>
				<?php echo \yii\helpers\StringHelper::truncate($item['body'], 100, '', null, true) ?>
			</div>
			<div class='clearfix'>
				<div class='a-date fleft'>
					<?php echo Yii::$app->formatter->asDatetime($item['published_at']) ?>
				</div>
				<a class='button-2 fright' href='<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>'>
					читать
				</a>
			</div>
		</li>
		<?php } ?>

	</ul>
</div>
<!-- article end -->