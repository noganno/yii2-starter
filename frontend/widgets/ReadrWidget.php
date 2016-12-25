<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class ReadrWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$connection = \Yii::$app->db;
			$sql = $connection->createCommand('(SELECT * FROM `article` WHERE TIMESTAMPDIFF(DAY,FROM_UNIXTIME(created_at, \'%Y-%m-%d %H:%i:%s\'),NOW()) < 7 ORDER BY `views` DESC LIMIT 3) ORDER BY `id` DESC');

			$result = $sql->queryAll();
			$i = 0;
			foreach ($result as $item) {
				if(\Yii::$app->language == 'uz') {
					
					$result[$i]['title'] = $item['title_uz'];
					$result[$i]['body'] = $item['body_uz'];
				}
				$i++;
			}

			return $this->render('read_r', ['result' => $result]);
		}
	}
