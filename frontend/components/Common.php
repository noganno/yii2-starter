<?php
    namespace frontend\components;

    use yii\base\Component;
    use DOMDocument;

    class Common extends Component
    {
        const EVENT_NOTIFY = 'notify_admin';

        public static function getRate($flag)
        {
            $file = $_SERVER['DOCUMENT_ROOT'] . "/currency_" . $flag . ".txt";
            if (file_exists($file)) {
                $rate = file_get_contents($file);
            }

            return $rate;
        }
    }