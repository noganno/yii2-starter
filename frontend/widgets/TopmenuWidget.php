<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class TopmenuWidget extends Widget
	{
		private $_query;
		public $type = 'top_menu';

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article_category')->where('top_menu=1')->orderBy(['id' => SORT_ASC])->all();

			$i = 0;
			foreach ($result as $item) {
				if(\Yii::$app->language == 'uz') {
					$item['title'] = $item['title_uz'];
					$item['body'] = $item['body_uz'];
				}

				if(!$item['parent_id']) {
					$item['sub'] = '';
					$arr[$item['id']]  = $item;
				} else {
					$arr[$item['parent_id']]['sub'][] = $item;
				}

				$i++;
			}
			return $this->render($this->type, ['result' => $arr]);
		}
	}
