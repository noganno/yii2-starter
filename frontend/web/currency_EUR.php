<?php
    $cur_file = 'currency_EUR.txt';
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, "http://www.cbu.uz/ru/arkhiv-kursov-valyut/xml/EUR/");
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
            $rate = $parser->CcyNtry->Rate;
        }
    } catch (Exception $e) {

    }
    @unlink($cur_file);
    $fp = @fopen($cur_file, 'x');
    fwrite($fp, $rate);
    fclose($fp);
    