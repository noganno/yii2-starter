<?php
	use yii\helpers\Html;
	use yii\helpers\Url;

	/*
	 * 5 D:\server\OpenServer\domains\today.dev\frontend\widgets\views\quote.php
Array
(
    [0] => Array
        (
            [id] => 2
            [title] => quote 2
            [title_uz] => quote 2
            [body] => 2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque. Sed pharetra nibh eget orci convallis at posuere leo convallis. Sed blandit augue vitae augue scelerisque bibendum. Vivamus sit amet libero turpis, no
            [body_uz] => 2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque. Sed pharetra nibh eget orci convallis at posuere leo convallis. Sed blandit augue vitae augue scelerisque bibendum. Vivamus sit amet libero turpis, no
            [status] => 1
        )

)
	 */
?>
<blockquote>
	<p class="mytext">
		<?php echo $result[0]['body'] ?>
	</p>
	<p class="author"> - <?php echo $result[0]['title'] ?></p>
	<p class="icon"><a><img src="/images/reload.png"> другая</a></p>
</blockquote>

