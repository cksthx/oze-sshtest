<?php
defined('TYPO3_MODE') || die();

// Add content element to seletor list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'LLL:EXT:base_teaser/Resources/Private/Language/locallang.xlf:contentElement.textTeaser.name',
        'textTeaser',
        'EXT:base_teaser/Resources/Public/Icons/textTeaser.svg'
    ),
    'CType',
    'teaser'
);

// Assign Icon
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['textTeaser'] = 'textTeaser';

// Configure element type
if (!is_array($GLOBALS['TCA']['tt_content']['types']['textTeaser'])) {
    $GLOBALS['TCA']['tt_content']['types']['textTeaser'] = [];
}
$GLOBALS['TCA']['tt_content']['types']['textTeaser'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['textTeaser'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,bodytext,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                assets,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.palette.gallerySettings;gallerySettings,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.imagelinks;imagelinks,
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
                    'richtextConfiguration' => 'default'
                ]
            ]
        ]
    ]
);

// Add crop variants
$defaultCropSettingsTextTeaser = [
    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
            'value' => 16 / 9
        ],
    ],
    'selectedRatio' => '16:9',
    'cropArea' => [
        'x' => 0.0025,
        'y' => 0.0025,
        'width' => 0.995,
        'height' => 0.995,
    ],
];

$CropSettingsTextTeaserDisplay1 = [
    'title' => 'LLL:EXT:project_configuration/Resources/Private/Language/locallang.xlf:contentElement.textTeaser.teaser-display-1',
    'allowedAspectRatios' => [
        '3:1' => [
            'title' => '3:1',
            'value' => 3 / 1
        ],
    ],
    'selectedRatio' => '3:1',
    'cropArea' => [
        'x' => 0.0025,
        'y' => 0.0025,
        'width' => 0.995,
        'height' => 0.995,
    ],
];

$GLOBALS['TCA']['tt_content']['types']['textTeaser']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettingsTextTeaser;
$GLOBALS['TCA']['tt_content']['types']['textTeaser']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['display1'] = $CropSettingsTextTeaserDisplay1;
