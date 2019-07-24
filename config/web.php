<?php
$params = require __DIR__ . '/params.php';
return
    [
        'name' => 'Modular',
        'id' => 'modular',
        'basePath' => realpath(__DIR__  . '/../'),
        'bootstrap' => [
            // \app\components\ConditionalRouting::class,
            'debug',
            'gii'
        ],
        'layoutPath' => realpath(__DIR__ . '/../modules/mod/views/layouts'),
        'viewPath' => realpath(__DIR__ . '/../modules/mod/views'),
        'defaultRoute' => 'mod/site/index',
        'aliases' => [
            '@bower' => '@vendor/bower-asset',
            '@npm' => '@vendor/npm-asset',
        ],
        'modules' =>
        [
            'gii' => array(
                'class' => 'yii\gii\Module',
            ),
            'debug' => 'yii\debug\Module',
            'mod' =>
            [
                'class' => 'app\modules\mod\Module'
            ],
            'store' => [
                'class' => 'app\modules\store\Module',
            ],
        ],
        'components' =>
        [
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => realpath(__DIR__ . '/../modules/mod/mail'),
                'useFileTransport' => true,

            ],
            'user' => [
                'identityClass' => 'app\models\User',
                'enableAutoLogin' => true,
                'loginUrl' => ['mod/user/signin'],
            ],
            'db' => require(__DIR__ . '/db.php'),
            'urlManager' =>
            [
                'showScriptName' => false,
                //            'enableStrictParsing' => true,
                'enablePrettyUrl' => true,
                'rules' =>
                [
                    'mod' => 'mod/site/index',
                    'signin' => 'mod/user/signin',
                    'signup' => 'mod/user/signup',
                    'about' => 'mod/site/about',
                    'logout' => 'mod/user/logout',
                    'verify-email' => 'mod/user/verify-email',
                    'reset-password' => 'mod/user/reset-password',
                    'request-password-reset' => 'mod/user/request-password-reset',
                    'store' => 'store/store/index',
                    'cart' => 'store/store/cart',
                    'games' => 'mod/games/list',
                    'life' => 'mod/games/life',
                    'chess' => 'mod/games/chess',
                    'flappy' => 'mod/games/flappy',
                    
                ]
            ],
            'request' => [
                'cookieValidationKey' => 'My Secret $'
            ],
        ],
        'params' => $params,
    ];
