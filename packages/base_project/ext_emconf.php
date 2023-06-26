<?php

/**
 * Extension Manager/Repository config file for ext "base_project".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Base Project',
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
            'Comkom\\BaseProject\\' => 'Classes'
        ]
    ],
    'constraints' => [
        'depends' => [
            'base_contentelements' => '3.0.0-3.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
            'typo3' => '10.4.0-11.99.99',
            'fluid_styled_content' => '10.4.0-11.99.99',
            'rte_ckeditor' => '10.4.0-11.99.99',
            'base_configuration' => '3.0-3.99',
            'container' => '1.2-2.99',
            'content_defender' => '3.1-3.99',
            'base_contentelements' => '3.0.0-3.99.99'
        ],
    ],
];
