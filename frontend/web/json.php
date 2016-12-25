<!--http://today.uz/restarticle/uz/?id=1 - получить статью с ID = 1
http://today.uz/restcat - получить список категорий
http://today.uz/restcat/8 - получить категорию с ID = 8
http://today.uz/restcat/8?cnt=3 - получить категорию с ID = 8 с количеством статей 3
http://today.uz/restcat/8?sort=new - получить категорию с ID = 8 новинки
http://today.uz/restcat/8?sort=top - получить категорию с ID = 8 самые комментируемые
http://today.uz/restcat/8?sort=read - получить категорию с ID = 8 самые просматриваемые

http://today.uz/restcat/sort/?where=actual&cnt=10 - актуальные сейчас
http://today.uz/restcat/sort/?cnt=3 - последние 3 новости (Больше новостей)
http://today.uz/restcat/sort/?sort=read&cnt=10 самые читаемые
http://today.uz/restcat/sort/?sort=top&cnt=10 самые обсуждаемые
http://today.uz/restcat/21/?cnt=10 - видео
http://today.uz/restcat/frontpage - вывести информацию главной страницы


http://today.uz/ru/restarticle/add-comments комментарий к статье, отправляется методом POST.
Передаются следующие данные
id: 24, - ID статьи
user_id : 4, ID пользователя
comment: "asdasd asd asd asd " Комментарий

http://today.uz/userrest/view/1 - get info user by ID = 1

signup user
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://today.uz/userrest/create');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=webmaster2&password=password2&email=webmaster@asasd.ru');
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Bot (http://today.uz/)');
$data = curl_exec($ch);
curl_close($ch);

http://today.uz/userrest/create?email=2@as2dasdasdasdasd.ru&password=111111&username=das2de

http://today.uz/site/auth?email=webmaster@example.com&password=webmaster login user
http://today.uz/site/request-password-reset?email=webmaster@example.com  - восстановление пароля

http://today.dev/ru/restarticle/add-fcm/13 - добавить fcm
-->

<?php
	$request = array(
		'username' => 'webmaster2',
		'password' => 'webmaster2',
		'email'    => 'webmaster@asasd.ru'
	);

	$options = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => "Content-Type: application/json; charset=utf-8\r\n",
			'content' => json_encode($request)
		)
	);

	//$context = stream_context_create($options);
	//echo file_get_contents('http://today.dev/restarticle/add-comments', 0, $context);

?>
<script src="/js/jquery.min.js"></script>
<script>

	/*var settings = {
		"async": true,
		"crossDomain": true,
		"url": "/test.php",
		"method": "POST",
		"type": "POST",
		"headers": {
			"content-type": "application/json; charset=UTF-8",
			"cache-control": "no-cache",
			"postman-token": "6f3ffd26-4c26-ad26-4b4b-9d78bfe2ca6e"
		},
		"data": {
			id: 1,
			comment: "asdasd asd asd asd "
		}
	}


	$.ajax(settings).done(function (response) {
		console.log(response);
	});*/

	$.ajax({
		type: 'POST',
		url: 'http://today.dev/ru/restarticle/add-comments',
		data:  {
			id: 24,
			user_id : 4,
			comment: "asdasd asd asd asd "
		},
		success: function(data) {
			console.log(data);
		},
		error:  function(xhr, str){
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	});



</script>

