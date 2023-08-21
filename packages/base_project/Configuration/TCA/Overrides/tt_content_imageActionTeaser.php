<?php
defined('TYPO3_MODE') || die();

/***************
 * Add content element to seletor list
 */

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'LLL:EXT:base_project/Resources/Private/Language/locallang.xlf:imageActionTeaser.name',
        'imageActionTeaser',
        'actions-image'
    ),
    'CType',
    'textmedia'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['imageActionTeaser'] = 'actions-image';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['imageActionTeaser'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            header,header_layout,header_style,bodytext,subheader,header_link,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
            assets,
            --palette--;;gallerySettings,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel',
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'minimal'
            ]
        ],
        'assets' => [
            'config' => [
                'maxitems' => 1,
            ]
        ]
    ]
];

/***************
 * Add crop variants
 */
$default = [
    'title' => 'Mobil, Tablet (XS, SM, MD)',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => '16:9',
            'value' => 16 / 9
        ],
    ],
    'selectedRatio' => '16:9',
    'cropArea' => [
        'x' => 0,
        'y' => 0,
        'width' => 1,
        'height' => 1,
    ],
];
$desktop = $default;
$desktop = [
    'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.l',
    'allowedAspectRatios' => [
        '3:1' => [
            'title' => '3:1',
            'value' => 3 / 1
        ],
    ],
    'selectedRatio' => '3:1',
    'cropArea' => [
        'x' => 0,
        'y' => 0,
        'width' => 1,
        'height' => 1,
    ],
];

$GLOBALS['TCA']['tt_content']['types']['imageActionTeaser']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = array(
    'default' => $default,
    'desktop' => $desktop,
);

$allowExtensions = 'gif,jpg,jpeg,png';
$GLOBALS['TCA']['tt_content']['types']['imageActionTeaser']['columnsOverrides']['assets']['config']['filter'][0]['parameters']['allowedFileExtensions']=$allowExtensions;
$GLOBALS['TCA']['tt_content']['types']['imageActionTeaser']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['uid_local']['config']['appearance']['elementBrowserAllowed']=$allowExtensions;