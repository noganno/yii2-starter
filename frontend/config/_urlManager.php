<?php
return [
    //'class'=>'yii\web\UrlManager',
	'class' => 'codemix\localeurls\UrlManager',
	'languages' => ['ru', 'uz'],
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=> [
        // Pages
        ['pattern'=>'page/<slug>', 'route'=>'page/view'],

        // Articles
        ['pattern'=>'article/index', 'route'=>'article/index'],
		['pattern' => 'article/search', 'route' => 'article/search'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
        ['pattern'=>'article/<slug>', 'route'=>'article/view'],
        ['pattern'=>'article/tags/<slug>', 'route'=>'article/tags'],

		['pattern' => 'restarticle/', 'route' => 'restarticle/index'],
		['pattern' => 'restarticle/search', 'route' => 'restarticle/search'],
		['pattern' => 'restarticle/page/<id:\d+>', 'route' => 'restarticle/page'],
		['pattern' => 'restarticle/add-fcm/<slug>', 'route' => 'restarticle/add-fcm'],
		['pattern' => 'restarticle/comments/<id:\d+>', 'route' => 'restarticle/comments'],
		['pattern' => 'restarticle/add-comments/', 'route' => 'restarticle/add-comments'],
		['pattern' => 'restcat/<id:\d+>', 'route' => 'restcat/view'],
		['pattern' => 'restcat/', 'route' => 'restcat/index'],
		['pattern' => 'restcat/sort', 'route' => 'restcat/sort'],
		['pattern' => 'restcat/frontpage', 'route' => 'restcat/frontpage'],
		
		['pattern' => 'site/auth', 'route' => 'site/auth'],
		['pattern' => 'site/request-password-reset', 'route' => 'site/request-password-reset'],
		
		['pattern' => 'userrest/index', 'route' => 'userrest/index'],
		['pattern' => 'userrest/create', 'route' => 'userrest/create'],
		['pattern' => 'userrest/view/<id:\d+>', 'route' => 'userrest/view'],

		// Category
        ['pattern'=>'category/<slug>', 'route'=>'category/view'],

		// Search
        ['pattern'=>'article/search', 'route'=>'article/search'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']],
		
		['pattern' => 'restarticle/<lang:\w+>', 'route' => 'restarticle/index'],
		['pattern' => 'restcat/<id:\d+>', 'route' => 'restcat/view'],
		['pattern' => 'restcat/', 'route' => 'restcat/index'],
			
    ]
];
