<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class ServiceWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article')->where('category_id=3')->orderBy(['id' => SORT_DESC])->limit(15)->all();

			return $this->render('service', ['result' => $result]);
		}
	}