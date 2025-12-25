<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],

    // Default route (login emas, API)
    'defaultRoute' => 'oop3-inheritance/add-example',

    'components' => [

        // Request component
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        // USER component — DBsiz, loginsiz
        'user' => [
            'identityClass' => null,
            'enableAutoLogin' => false,
            'enableSession' => false,
        ],

        // Session (kerak, lekin login yo‘q)
        'session' => [
            'name' => 'advanced-backend',
        ],

        // Error handler
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        // Log
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        /*
        // Agar keyin kerak bo‘lsa
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
        */
    ],

    'params' => $params,
];
