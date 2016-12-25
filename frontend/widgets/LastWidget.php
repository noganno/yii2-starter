<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;
	use common\models\Article;

	class LastWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = Article::find();
			$result = $query->orderBy(['id' => SORT_DESC])->limit(8)->all();

			$i = 0;
			foreach ($result as $item) {
			
				if(\Yii::$app->language == 'uz') {
					
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}
			return $this->render('last', ['result' => $result]);
		}
	}