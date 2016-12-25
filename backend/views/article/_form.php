<?php

    use trntv\filekit\widget\Upload;
    use trntv\yii\datetime\DateTimeWidget;
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use mihaildev\ckeditor\CKEditor;
    use sjaakp\taggable\TagEditor;
    use yii\helpers\Url;

    /* @var $this yii\web\View */
    /* @var $model common\models\Article */
    /* @var $categories common\models\ArticleCategory[] */
    /* @var $form yii\bootstrap\ActiveForm */
?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
        $categories,
        'id',
        'title'
    ), ['prompt' => '']) ?>

    <?php echo $form->field($model, 'body')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['clips',
                'fullscreen',
                'fontfamily',
                'fontsize',
                'fontcolor',
                'video',
                'table'],
            'options' => [
                'minHeight'    => 400,
                'maxHeight'    => 400,
                'buttonSource' => true,
                'imageUpload'  => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'body_uz')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['clips',
                'fullscreen',
                'fontfamily',
                'fontsize',
                'fontcolor',
                'video',
                'table'],
            'options' => [
                'minHeight'    => 400,
                'maxHeight'    => 400,
                'buttonSource' => true,
                'imageUpload'  => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>
    <?php /*echo $form->field($model, 'body_uz')->widget(
		\yii\imperavi\Widget::className(),
		[
			'plugins' => ['fullscreen', 'fontcolor', 'video'],
			'options' => [
				'minHeight'       => 400,
				'maxHeight'       => 400,
				'buttonSource'    => true,
				'convertDivs'     => false,
				'removeEmptyTags' => false,
				'imageUpload'     => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
			]
		]
	)*/ ?>

    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url'         => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url'              => ['/file-storage/upload'],
            'sortable'         => true,
            'maxFileSize'      => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]);
    ?>

    <?php //echo $form->field($model, 'tags')->textInput() ?>

    <?php
        $arrTags = explode(',', $model->tags);

    ?>

    <div class="suggest-tag" value='[<?php foreach ($arrTags as $key => $arrTag) { echo '"'.str_replace("'", "", trim($arrTag)).'"'; ?><? if($key<count($arrTags)-1) { ?>,<? } ?> <? } ?>]'></div>

    <?php echo $form->field($model, 'actual')->checkbox() ?>

    <?php echo $form->field($model, 'news_day')->checkbox() ?>

    <?php echo $form->field($model, 'fast')->checkbox() ?>

    <?php echo $form->field($model, 'facebook')->checkbox() ?>
    <?php echo $form->field($model, 'push')->checkbox() ?>
    <?php echo $form->field($model, 'description')->textInput() ?>
    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'published_at')->widget(
        DateTimeWidget::className(),
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ'
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
<?php $arrTags = explode(',', $model->tags); ?>
<script>

    jQuery(document).ready(function(){
        $('.suggest-tag').magicSuggest({
            data: [
                <?php if(is_array($tags)) { foreach ($tags as $tag) {?>
                {"Id": "<?php echo $tag['name'] ?>", "Name": "<?php echo $tag['name'] ?>"},
                <?php } } ?>

            ],
            name: "tags",
            placeholder: 'Вводите тэг',
            valueField: 'Id',
            displayField: 'Name',
        });
        $('.ms-ctn input').attr('name', 'tags');
    })



</script>
