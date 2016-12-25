<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;
	use frontend\widgets\Yii;

	class CategriesWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article_category')->orderBy(['id' => SORT_DESC])->all();

			$i = 0;
			foreach ($result as $item) {
				if(\Yii::$app->language == 'uz') {
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}


			return $this->render('categories', ['result' => $result]);
		}
	}
