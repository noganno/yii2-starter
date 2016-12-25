<?php

	namespace frontend\widgets;

	use yii\base\Widget;
	use yii\db\Query;

	class TagsWidget extends Widget
	{
		private $_query;

		public function init()
		{
			$this->_query = new Query();
		}

		public function run()
		{
			$query = $this->_query;
			$result = $query->select('name')->distinct()->from('tags')->orderBy(['id' => SORT_DESC])->limit(20)->all();

			return $this->render('tags', ['result' => $result]);
		}
	}
