<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class SliderWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article')->where('news_day=1 AND UNIX_TIMESTAMP(CURRENT_DATE()) < created_at')->orderBy(['id' => SORT_DESC])->limit(10)->all();
			$i = 0;
			foreach ($result as $item) {
			
				if(\Yii::$app->language == 'uz') {
					
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}
			return $this->render('slider', ['result' => $result]);
		}
	}