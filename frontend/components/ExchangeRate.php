<?php
    namespace frontend\components;
    use yii\base\Component;

    class ExchangeRate {

        public $exchange_url =
            'http://www.cbu.uz/ru/arkhiv-kursov-valyut/xml/';
        public $xml;

        function __construct(){
            if(@simplexml_load_file($this->exchange_url)) {
                return $this->xml =
                    simplexml_load_file($this->exchange_url);
            }             
        }

        function getExchangeRateByChar3($char3){
            /*if ($this->xml !==FALSE && is_object($this->xml->children())) {
                foreach($this->xml->children() as $item){
                    $row = simplexml_load_string($item->asXML());
                    $v = $row->xpath('//Ccy[. ="' . $char3 . '"]');

                    foreach ($row->xpath('//Ccy') as $step) {
                        if($step == $char3) {
                            foreach ($row->xpath('//Rate') as $rate) {
                                $result = $rate;
                            }
                        }
                    }
                }
            }*/

            return $result;
        }
    }