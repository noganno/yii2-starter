<?php
	// старт сессии необходим библиотеке
	session_start();

	require_once __DIR__ . '/Facebook/autoload.php';

// App ID и App Secret из настроек приложения
	$app_id = "161618067560115";
	$app_secret = "da40e83fa35ffea4caa02a3ebd08b7df";

// ссылка на страницу возврата после авторизации
// домен должен совпадать с указанным в настройках приложения
	$callback = "http://backend.today.uz/callback.php";

	$fb = new Facebook\Facebook([
		'app_id'  => $app_id,
		'app_secret' => $app_secret,
		'default_graph_version' => 'v2.4',
	]);

	$helper = $fb->getRedirectLoginHelper();

// для публикации в группах достаточно разрешения publish_actions
// для публикации на страницах нужны все 3 элемента
	$permissions = ['publish_actions','manage_pages','publish_pages'];
	$loginUrl = $helper->getLoginUrl($callback, $permissions);

	echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';