<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class QuoteWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('quote')->where('status=1')->orderBy(['id' => SORT_DESC])->limit(1)->all();
			$i = 0;
			foreach ($result as $item) {
			
				if(\Yii::$app->language == 'uz') {
					
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}
			return $this->render('quote', ['result' => $result]);
		}
	}