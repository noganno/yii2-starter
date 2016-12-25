<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class InfoWidget extends Widget
	{
		private $_query;
		public $id;
		public $type;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('page')->where('id=' . $this->id )->one();
				if(\Yii::$app->language == 'uz') {
					$result['title'] = $result['title_uz'];
					$result['body'] = $result['body_uz'];				
			}
			return $this->render($this->type, ['result' => $result]);
		}
	}
