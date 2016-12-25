<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class ReadWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article')->where('TIMESTAMPDIFF(DAY,FROM_UNIXTIME(created_at, \'%Y-%m-%d %H:%i:%s\'),NOW()) <= 7')->orderBy(['views' => SORT_DESC])->limit(4)->all();

			$i = 0;
			foreach ($result as $item) {
				if(\Yii::$app->language == 'uz') {
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}

			return $this->render('read', ['result' => $result]);
		}
	}