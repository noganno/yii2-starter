<?php
	use common\widgets\DbText;

?>
<div class="informers">

	<!-- информер валюты -->
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">

		<div class="w-currency">
			<p class="w-currency_title"><?php echo Yii::t('frontend', 'Курсы валют') ?></p>

			<p class="w-currency_date">на <?php echo date('d.m.Y') ?> год</p>
			<table>
				<tr>
					<th><?php echo Yii::t('frontend', 'валюта') ?></th>
					<th><?php echo Yii::t('frontend', 'курс') ?></th>
					<th colspan="2"><?php echo Yii::t('frontend', 'изменение') ?></th>
				</tr>
				<tr>
					<td>1 USD</td>
					<td><?= \frontend\components\Common::getRate('USD') ?></td>
					<td><span class="green">5.03</span></td>
					<td><span class="caret green"></span></td>
				</tr>
				<tr>
					<td>1 EUR</td>
					<td><?= \frontend\components\Common::getRate('EUR') ?></td>
					<td><span class="green">70.73</span></td>
					<td><span class="caret green"></span></td>
				</tr>
				<tr>
					<td>1 RUB</td>
					<td><?= \frontend\components\Common::getRate('RUB') ?></td>
					<td><span class="red2">0.93</span></td>
					<td><span class="caret red2"></span></td>
				</tr>
			</table>
		</div>

	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
		<div class="forex_informer"><!-- Информер 2 -->
			<table width="186" border="0" style="border-collapse: collapse; text-align:center; font-size:11px; color:#000000; "><tr bgcolor=""><td colspan="3"><a href="http://www.forexpf.ru/quote_show.php" title="товарные рынки"><?php echo Yii::t('frontend', 'FOREX КОТИРОВКИ') ?></a></td></tr><tr bgcolor=""><td></td><td>BID</td><td>ASK</td</tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/gold/" title="золото" target="_blank"><?php echo Yii::t('frontend', 'Золото') ?></a></td><td id="cgoldb">0.00</td><td id="cgolda">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/silver/" title="серебро" target="_blank"><?php echo Yii::t('frontend', 'Серебро') ?></a></td><td id="csilverb">0.00</td><td id="csilvera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/platinum/" title="платина" target="_blank"><?php echo Yii::t('frontend', 'Платина') ?></a></td><td id="cplatb">0.00</td><td id="cplata">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/brent/" title="нефть Брент" target="_blank"><?php echo Yii::t('frontend', 'Нефть Брент') ?></a></td><td id="cbrentb">0.00</td><td id="cbrenta">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/lightsweet/" title="нефть light sweet" target="_blank"><?php echo Yii::t('frontend', 'Нефть Light') ?></a></td><td id="clightb">0.00</td><td id="clighta">0.00</td></tr><tr bgcolor=""><td id="ccomtm" colspan="3"></td></tr></table><script type="text/javascript" charset="windows-1251" src="http://www.forexpf.ru/_informer_/comod.php?id=01723"></script>
		</div>
	</div>



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
		<div id="3bc705d56c8d2e9d3771c64d5676c736"><p><a href="http://world-weather.ru/pogoda/uzbekistan/tashkent/">Ташкент
					- подробный прогноз</a></p></div>
		<script type="text/javascript" charset="utf-8"
				src="http://world-weather.ru/wwinformer.php?userid=3bc705d56c8d2e9d3771c64d5676c736"></script>

	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<?php echo DbText::widget(['key' => 'inf_banner']) ?>
	</div>
	<div class="clearfix"></div>

</div>