<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'core',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'resumeditor.com',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],

		'urlManager' => [
			'showScriptName' => false,
			'enablePrettyUrl' => true,
			'rules' => [

                          'career/<id:\d+>' => 'career/detail',
                           '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                           'career/<id:\d+>-<slug>' => 'career/slug',

		  'personal' =>'users',
          'login' => 'site/login',
          'signup' => 'users/signup',
          'logout' => 'site/logout',
          'cv' => 'site/cv',
          'contactus' => 'site/contact',
          'termsconditions' => 'site/termsconditions',
          'aboutus' => 'site/about',
          'changepassword' => 'users/changepassword',
          'forgotpassword' => 'users/forgotpassword',



			],



		],

    'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '1792741884330031',
                    'clientSecret' => '7986f075d64d9365d2e7232e36dd7d7d',
                ],
            ],
       ],


        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'useFileTransport' => false,


            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'gudangjobcom@gmail.com',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
                       ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
	/*
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

	*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
