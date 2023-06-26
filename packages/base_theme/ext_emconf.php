<?php

/**
 * Extension Manager/Repository config file for ext "theme".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Base Theme',
    'description' => '',
    'category' => 'templates',
    'author' => 'Team COMKOM°',
    'author_email' => 'mail@comkom.de',
    'author_company' => 'COMKOM',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '3.2.3',
    'autoload' => [
        'psr-4' => [
            'Comkom\\BaseTheme\\' => 'Classes'
        ]
    ],
    'constraints' => [
        'depends' => [
        ],
        'conflicts' => [
        ],
    ],
];
