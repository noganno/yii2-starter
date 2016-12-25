<?php
	/* @var $this yii\web\View */
	use yii\helpers\Html;
	use yii\helpers\Url;
	use common\widgets\DbText;

?>

<?php
		foreach ($models as $model) { ?>
		  <article class="last_news">
		    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 thumbnail">
		      <div class="comment" style="display:none"><?php echo $model->comments ?></div>
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
		    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		      <h3>
		        <?php echo Html::a($model->title, ['article/view', 'slug' => $model->slug]) ?>
		      </h3>
		      <p class="meta">
			    <div class="my_meta">
					<ul>
					<li><span class="date"><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?> </span><span class="author">,</span></li>
					<li><img src="../../images/views12.png" /></li>
					<li><span class="views"><?php echo $model->views; ?>,</span>
					  <a href="<?= Url::to(['category/view', 'slug' => $model->category->slug]) ?>"><?= $model->category->title ?></a></li>
					</li>
					</ul>
				</div>	
		      </p>
			  <div class="my_content">
				<p class="content1">
					<?php echo \yii\helpers\StringHelper::truncate(strip_tags($model->body), 150) ?>
				</p>
			  </div>
		    </div>
		    <div class="clearfix"></div>
		   </article> <div class="clearfix"></div>
   	<?php } ?>
