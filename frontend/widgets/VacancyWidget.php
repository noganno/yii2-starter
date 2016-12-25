<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class VacancyWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->from('article')->where('category_id=6')->limit(2)->all();

			return $this->render('vacancy', ['result' => $result]);
		}
	}