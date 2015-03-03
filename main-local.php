<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    		
    		'authClientCollection' => [
    				'class' => 'yii\authclient\Collection',
    				'clients' => [
    						//'google' => [
    								//'class' => 'yii\authclient\clients\GoogleOpenId'
    						//],
    						'facebook' => [
    								'class' => 'yii\authclient\clients\Facebook',
                                                                'authUrl' => 'https://www.facebook.com/dialog/oauth',
    								'clientId' => '1553656018251147',
    								'clientSecret' => '560f44487fc8afeaa4c098ea453f1a1a',
    						],
    				],
    		],
                  
    ],
];