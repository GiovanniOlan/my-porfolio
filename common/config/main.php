<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '<controller:[\w-]+>/<id:\d+>'              => '<controller>/view',
                '<controller:[\w-]+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w-]+>/<action:\w+>'          => '<controller>/<action>',




                // '<controller:\w+>/<id:\d+>' => '<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>/<page:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>/<page:\d+>/<per-page:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>/<page:\d+>/<sort:\w+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>/<page:\d+>/<per-page:\d+>/<sort:\w+>' => '<controller>/<action>',

            ],
        ],

    ],
];
