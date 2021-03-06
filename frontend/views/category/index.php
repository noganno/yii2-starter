<?php
	/* @var $this yii\web\View */
	use yii\helpers\Html;
	use yii\helpers\Url;
	use common\widgets\DbText;

	$this->title = Yii::t('frontend', $models[0]->category->title);

?>

<!--- Баннер  -->
<?php echo DbText::widget(['key' => 'top_banner']) ?>
<!-----!Баннер!-->

<!--- Левый контент -->
<div class="col-lg-8 col-md-8 col-sm-8" >

	<p class="cat"><?php echo Yii::t('frontend', 'Категория') ?>: <b><?php echo $models[0]->category->title.$lang ?></b></p>

	<div id="listView">
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
							<span class="date"><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?> </span> <?php echo Yii::t('frontend', '') ?> <span class="author"></span><?php echo Yii::t('frontend', 'Просмотров') ?>: <span class="views"><?php echo $model->views; ?></span>. <?php echo Yii::t('frontend', '') ?>:
							<a href="<?= Url::to(['category/view', 'slug' => $model->category->slug]) ?>"><?= $model->category->title ?></a>
						</p>
						<p class="content">
							<?php echo \yii\helpers\StringHelper::truncate($model->body, 150) ?>
						</p>
					</div>
					<div class="clearfix"></div>
				</article>
			<?php } ?>
	</div>


	<?php
		if ($pages->totalCount > $pages->validatePage) {
			?>

			<p id="loading" style="display:none"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/loading.gif" alt="" /></p>
			<a href="#" id="showMore" class="big"><?php echo Yii::t('frontend', 'Больше новостей') ?></a>

			<script type="text/javascript">
				/*<![CDATA[*/
				(function($)
				{
					// скрываем стандартный навигатор
					$('.paginator').hide();

					// запоминаем текущую страницу и их максимальное количество
					var page = parseInt('<?php echo (int)$pages->validatePage; ?>');
					var pageCount = parseInt('<?php echo (int)$pages->totalCount; ?>');

					var loadingFlag = false;

					$('#showMore').click(function()
					{
						// защита от повторных нажатий
						if (!loadingFlag)
						{
							// выставляем блокировку
							loadingFlag = true;

							// отображаем анимацию загрузки
							$('#loading').show();

							$.ajax({
								type: 'post',
								url: '<?php echo Url::to(''); ?>',
								data: {
									// передаём номер нужной страницы методом POST
									'page': page + 1,

								},
								success: function(data)
								{
									// увеличиваем номер текущей страницы и снимаем блокировку
									page++;
									loadingFlag = false;

									// прячем анимацию загрузки
									$('#loading').hide();

									// вставляем полученные записи после имеющихся в наш блок
									$('#listView').append(data);

									// если достигли максимальной страницы, то прячем кнопку
									if (page >= pageCount)
										$('#showMore').hide();
								}
							});
						}
						return false;
					})
				})(jQuery);
				/*]]>*/
			</script>

		<?php } ?>




</div>
<!-- !Левый контент! -->
