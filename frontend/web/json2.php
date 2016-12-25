<?php
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://today.dev/userrest/create');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=webmaster22&password=password2&email=webmaster22@asasd.ru');
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Bot (http://today.dev/)');
$data = curl_exec($ch);
curl_close($ch);