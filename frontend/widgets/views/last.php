<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<!---Последние новости --->
<h3 class="block_title"><a href="/article/?sort=new" ><?php echo Yii::t('frontend', 'Последние <strong>новости</strong>') ?></a></h3>
<article class="last_news">
<?php for($i=0; $i<6; $i++) { ?>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 thumbnail">
		<div class="comment" style="display:none"><?php echo $result[$i]['comments'] ?></div>
		<img src="<?= Yii::$app->glide->createSignedUrl([
			'glide/index',
			'path' => $result[$i]['thumbnail_path'],
			'w'    => 197,
			'h'    => 131,
			'fit'  => 'crop',			'q' => 100
		], true) ?>" alt=""/>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h3>
			<a href="<?= Url::to(['article/view', 'slug' => $result[$i]['slug']]) ?>"><?php echo $result[$i]['title'] ?></a>
		</h3>

		<p class="meta">
		<div class="my_meta">
			<ul>
				<li><span class="date"><?=Yii::$app->formatter->asDatetime($result[$i]['published_at'])?></span> <?php echo Yii::t('frontend', '') ?> <span class="author">,</span></li>
				<li> <img src="images/views12.png" /> </li>
				<li> <span class="views"><?php echo $result[$i]['views'] ?> ,</span> <?php echo Yii::t('frontend', '') ?> <a href="<?= Url::to(['category/view', 'slug' => $result[$i]->category->slug]) ?>"><?= $result[$i]->category->title ?></a></li>
			</ul>
		</div>	
		</p>

		<div class="content textblock-last">
			<?php echo \yii\helpers\StringHelper::truncate(strip_tags($result[$i]['body']),200, '', null) ?>
		</div>
	</div>
	<div class="clearfix br-box"></div>
<?php } ?>
</article>
<!--- ! Последние новости ! --->
<div class="clearfix"></div>
<!--- ! Больше новостей ! ---->

