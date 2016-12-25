<?php
    $cur_file = 'currency_USD.txt';
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, "http://www.cbu.uz/ru/arkhiv-kursov-valyut/xml/USD/");
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $xml_data=curl_exec($ch);
    curl_close($ch);

    try {
        $dom = new DOMDocument;
        $dom->loadXML($xml_data);
        if (!$dom) {
            echo 'Ошибка при разборе документа';
            exit;
        }
        if ($xml_data) {
            $parser = simplexml_import_dom($dom);

            echo $rate = $parser->CcyNtry->Rate;
        }
    } catch (Exception $e) {

    }
    @unlink($cur_file);
    $fp = @fopen($cur_file, 'x');
    fwrite($fp, $rate);
    fclose($fp);
    die;


    $er = new ExchangeRate();

    $data = $er->getExchangeRateByChar3('USD');


    class ExchangeRate {

        // URL, файл в формате XML
        public $exchange_url =
            'http://www.cbu.uz/ru/arkhiv-kursov-valyut/xml/';
        public $xml;

        function __construct(){
            // интерпретируем XML-файл в объект
            return $this->xml =
                simplexml_load_file($this->exchange_url);
        }

        function getExchangeRateByChar3($char3){

            if ($this->xml!==FALSE) {
                // все хорошо, можно работать дальше -
                // в XML-данных нет ошибки

                foreach($this->xml->children() as $item){
                    $row = simplexml_load_string($item->asXML());
                    // Выполняем XPath-запрос к XML-данным
                    /*
                     *  [@attributes] => Array
                            (
                                [ID] => 784
                            )

                        [Ccy] => AED
                        [CcyNm_RU] => Дирхам ОАЭ
                        [CcyNm_UZ] => BAA dirhami
                        [CcyNm_UZC] => БАА дирҳами
                        [CcyNm_EN] => UAE Dirham
                        [CcyMnrUnts] => 2
                        [Nominal] => 1
                        [Rate] => 844.64
                        [date] => 01.11.2016
                     */
                    $v = $row->xpath('//Ccy[. ="' . $char3 . '"]');

                    foreach ($row->xpath('//Ccy') as $step) {
                        if($step == $char3) {
                            foreach ($row->xpath('//Rate') as $rate) {
                                $result = $rate;
                            }
                        }
                    }
                }
            }

            return $result;
        }
    }

    die;

        list($dollar, $euro, $uzs)=load_kurs();
        echo "<div>Курс ЦБ РФ на <b>".date("d.m.Y H:i",filemtime($_SERVER['DOCUMENT_ROOT']."/kurs.txt"))."</b><br>
    Доллар - <b>".$dollar."</b><br>
    Евро - <b>".$euro."</b></div>
    Сум - <b>".$uzs."</b></div>";

        function load_kurs()
        {
            define("tsKurs","15:00:00");		# Время смены курса центральным банком
            $kurs_file=$_SERVER['DOCUMENT_ROOT']."/kurs.txt";
            if (file_exists($kurs_file)){
                $lastModified=filemtime($kurs_file);
                // каждые 24 часа, но с учетом времени смены курса центральным банком
                if (date("Y-m-d H:i:s",$lastModified) > date("Y-m-d H:i:s",time()-60*60*24) && !(date("H:i:s",$lastModified) < tsKurs && date("H:i:s")>tsKurs ) ) {
                    return explode('|',file_get_contents($kurs_file));
                    //echo "<!--Курс ЦБ на ".date("Y-m-d H:i:s",$lastModified)."<br>Доллар - <b>".$dollar."</b><br>Евро - <b>".$euro."</b><br>".$df1."-->";
                }
            }

    // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru
            $content = get_content();

            if(!$content&&file_exists($kurs_file)){// считаю по старому курсу если он есть
                return explode('|',file_get_contents($kurs_file));
            }

            // Разбираем содержимое, при помощи регулярных выражений
            $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
            preg_match_all($pattern, $content, $out1, PREG_SET_ORDER);
            $dollar = "";
            $euro = "";
            foreach($out1 as $cur1)
            {
                if($cur1[2] == 840) $dollar = str_replace(",",".",$cur1[4]);
                if($cur1[2] == 978) $euro   = str_replace(",",".",$cur1[4]);
                if($cur1[2] == 860) $uzs   = str_replace(",",".",$cur1[4]);
            }

            if(file_put_contents($kurs_file, $kurs=($dollar.'|'.$euro.'|'.$uzs))<7)die('Ошибка записи в '.$kurs_file);
            return explode('|',$kurs);
        }

        function get_content()
        {
            // Формируем сегодняшнюю дату
            $date = date("d/m/Y");
            // Формируем ссылку
            $link = "http://www.cbu.uz/ru/arkhiv-kursov-valyut/xml/";

            // Загружаем HTML-страницу
            $fd = @fopen($link, "r");
            $text="";
            if (!$fd) echo "<h3>Сервер ЦБ не отвечает!</h3>";
            else
            {
                while (!feof ($fd)) $text .= @fgets($fd, 4096);
                @fclose ($fd);
            }
            return $text;
        }


