<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;
	use common\models\Article;

	class CategriesMobileWidget extends Widget
	{
		private $_query;
		public $type;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article_category')->orderBy(['id' => SORT_ASC])->all();

			$i = 0;
			foreach ($result as $item) {
				$count = (new \yii\db\Query())
					->from('article')
					->where(['category_id' => $item['id']])
					->count();
					
				if(\Yii::$app->language == 'uz') {
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}

				$result[$i]['count'] = $count;
				$i++;
			}

			return $this->render('categories_mobile_'.$this->type, ['result' => $result]);
		}
	}
