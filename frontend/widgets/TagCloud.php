<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;
	use frontend\models\Tag;
	class TagCloud extends Widget
	{

		private $_query;
		public $limit = 20;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$tags = Tag::model()->findTagWeights($this->limit);
			foreach ($tags as $tag => $weight)
				echo CHtml::tag('span', array('style' => "font-size:{$weight}pt"), $tag);
		}
	}