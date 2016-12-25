<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>
<?php
	foreach ($models as $model) { ?>
		<article class="last_news">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 thumbnail">
				<div class="comment"><?php echo $model->comments ?></div>
				<?php echo Html::img(
					Yii::$app->glide->createSignedUrl([
						'glide/index',
						'path' => $model->thumbnail_path,
						'w'    => 200,
						'h' => 133,
						'fit' => 'crop'
					], true),
					['class' => 'article-thumb img-rounded pull-left']
				) ?>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>
					<?php echo Html::a($model->title, ['article/view', 'slug' => $model->slug]) ?>
				</h3>
				<p class="meta">
					<span class="date"><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?> </span> Доб <span class="author">Админ</span>.Просмотров: <span class="views"><?php echo $model->views; ?></span>. Категория1:
					<?php echo Html::a(
						$model->category->title,
						['index', 'ArticleSearch[category_id]' => $model->category_id]
					) ?>
				</p>
				<p class="content">
					<?php echo \yii\helpers\StringHelper::truncate($model->body, 150) ?>
				</p>
			</div>
			<div class="clearfix"></div>
		</article>
	<?php } ?>
