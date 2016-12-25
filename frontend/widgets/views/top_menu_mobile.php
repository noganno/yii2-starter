<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<ul class="nav navbar-nav">
	<li><a href="/"><img src="/images/home.png" /></a></li>
	<?php foreach ($result as $key => $value) {

			?>
			<li <?php if (Url::current() == Url::to(['category/view', 'slug' => $value['slug']])) echo 'class="active"'; ?>>
				<a href="<?= Url::to(['category/view', 'slug' => $value['slug']]) ?>"><?php echo $value['title'] ?></a>
			</li>
		<?php }

	?>
</ul>
