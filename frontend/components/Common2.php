<?php
	namespace frontend\components;

	use yii\base\Component;
	use DOMDocument;

	class Common extends Component
	{
		const EVENT_NOTIFY = 'notify_admin';

		public static function getRate($code)
		{
			$cur_file = 'currency_' . $code . '.cache';
			if (time() >= time(1, 0, 0, date("m"), date("d"), date("Y")) && @filemtime($cur_file) < time(0, 0, 10, date("m"), date("d") - 1, date("Y"))) {

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'http://cbu.uz/ru/arkhiv-kursov-valyut/xml/' . $code . '/' . date('Y-m-d') . '/');
			//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30);
				curl_setopt($ch, CURLOPT_HEADER, 0);

				$xml_data = curl_exec($ch);

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
//echo '<pre>stroka: '.__LINE__.' file:  '.__FILE__.'<br>' ;print_r($rate);echo '</pre>';

				@unlink($cur_file);
				$fp = @fopen($cur_file, 'x');
				fwrite($fp, $rate);
				fclose($fp);

			}

			$fp = @fopen($cur_file, 'r');
			$content = @fread($fp, filesize($cur_file));
			fclose($fp);

			return $content;

		}
	}