<?php
	namespace frontend\models;

	use Yii;
	use yii\base\Model;
	/**
	 * @author Troy <troytft@gmail.com>
	 */
	class Tag extends Model
	{
		/**
		 * Минимальный размер шрифта
		 */
		const MIN_FONT_SIZE = 1;

		/**
		 * Максимальный размер шрифта
		 */
		const MAX_FONT_SIZE = 10;

		public static function model($className = __CLASS__)
		{
			return parent::model($className);
		}


		public function tableName()
		{
			return '{{tags}}';
		}


		/**
		 * Возвращает теги вместе с их весом
		 * @param integer $limit число возвращаемых тегов
		 * @return array вес с индексом равным имени тега
		 */
		public function findTagWeights($limit = 20)
		{
			$tags = array();

			$models = $this->findAll(array(
				'limit' => $limit,
			));

			$sizeRange = self::MAX_FONT_SIZE - self::MIN_FONT_SIZE;

			$minCount = log(Yii::app()->db->createCommand("SELECT MIN(frequency) FROM " . $this->tableName())->queryScalar() + 1);
			$maxCount = log(Yii::app()->db->createCommand("SELECT MAX(frequency) FROM " . $this->tableName())->queryScalar() + 1);
			$countRange = $maxCount - $minCount;

			foreach ($models as $model)
				$tags[$model->name] = round(self::MIN_FONT_SIZE + (log($model->frequency + 1) - $minCount) * ($sizeRange / $countRange));

			return $tags;
		}


	}