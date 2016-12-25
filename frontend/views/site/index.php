<?php
	/* @var $this yii\web\View */
	$this->title = "O`ZBEKISTON YANGILIKLAR PORTALI";
	use yii\helpers\Html;
$this->registerMetaTag(['description' => Yii::t('app', 'Today.uz bugun haqida bugun yozuvchi sayt. Bizni kuzatib boring, so`nggi yangiliklardan boxabar bo`ling. yangiliklarda o`z izohlaringizni qoldiring. Yangiliklarni ijtimoiy tarmoqlarda o`z yaqinlaringiz bilan bo`lishing.')]);
$this->registerMetaTag(['keyword' => Yii::t('app', 'O`ZBEKISTON YANGILIKLAR PORTALI')]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => '<a href="http://today.uz">Today.uz</a> bugun haqida bugun yozuvchi sayt. Bizni kuzatib boring, so`nggi yangiliklardan boxabar bo`ling. yangiliklarda o`z izohlaringizni qoldiring. Yangiliklarni ijtimoiy tarmoqlarda o`z yaqinlaringiz bilan bo`lishing.'
]);

$this->registerMetaTag([
    'name' => 'title',
    'content' => 'O`ZBEKISTON YANGILIKLAR PORTALI'
]);

$this->registerMetaTag([
    'name' => 'keyword',
    'content' => 'Новостной портал Узбекистана'
]);

?>



 
<?php echo \frontend\widgets\SliderWidget::widget(); ?>
<!--- Левый контент --->
<div class="col-lg-8 col-md-8 col-sm-8">

	<?php echo \frontend\widgets\ActualWidget::widget(); ?>

	<?php echo \frontend\widgets\LastWidget::widget(); ?>

	<?php echo \frontend\widgets\ReadWidget::widget(); ?>

	<?php echo \frontend\widgets\VideoWidget::widget(); ?>

</div>
<!-- !Левый контент! --->