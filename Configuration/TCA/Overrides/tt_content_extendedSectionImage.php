<?php
defined('TYPO3_MODE') || die();

/***************
 * Add content element to seletor list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'LLL:EXT:base_extendedsection/Resources/Private/Language/locallang.xlf:contentElement.extendedSectionImage.name',
        'extendedSectionImage',
        'EXT:base_extendedsection/Resources/Public/Icons/extendedSectionImage.svg'
    ),
    'CType',
    'extended_section'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['extendedSectionImage'] = 'extendedSectionImage';

/***************
 * Configure element type
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['extendedSectionImage'])) {
    $GLOBALS['TCA']['tt_content']['types']['extendedSectionImage'] = [];
}

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['extendedSectionImage'],
    [
        'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                    assets,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            '
    ]
);

/***************
 * Add crop variants
 */
$defaultCropArea = [
    'x' => 0.0,
    'y' => 0.0,
    'width' => 1.5,
    'height' => 1,
];

// Keyvisual croppings

$default = [
    'title' => 'Mobile',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Annähernd quadratisch',
            'value' => 1.5 / 1
        ],
    ],
    'cropArea' => $defaultCropArea,
    'backend_layout' => 'static, flex'
];

$medium = $default;
$medium['title'] = 'Tablet';

$desktop = [
    'title' => 'Desktop',
    'allowedAspectRatios' => [
        '3:1' => [
            'title' => '3:1',
            'value' => 3 / 1
        ],
    ],
    'cropArea' => [
        'x' => 0.0025,
        'y' => 0.0025,
        'width' => 2.995,
        'height' => 0.995,
    ],
    'backend_layout' => 'static, flex'
];

$desktopFixed = [
    'title' => 'Key visual: Fixed',
    'allowedAspectRatios' => [
        '4:3' => [
            'title' => 'Fixed Image for Desktops',
            'value' => 4 / 3
        ],
    ],
    'cropArea' => $defaultCropArea,
    'backend_layout' => 'static, flex'
];

// Hero croppings

$heroDefault = [
    'title' => 'Mobile',
    'allowedAspectRatios' => [
        '9:16' => [
            'title' => 'Hochformat',
            'value' => 9 / 16
        ],
    ],
    'cropArea' => $defaultCropArea,
    'backend_layout' => 'heroimage'
];

$heroMedium = $heroDefault;
$heroMedium['title'] = 'Tablet';

$heroDesktop = [
    'title' => 'Desktop',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => 'Querformat',
            'value' => 16 / 9
        ],
    ],
    'cropArea' => $defaultCropArea,
    'backend_layout' => 'heroimage'
];

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = array(
    'default' => $default,
    'medium' => $medium,
    'desktop' => $desktop,
    'desktopfixed' => $desktopFixed,
    'herodefault' => $heroDefault,
    'heromedium' => $heroMedium,
    'herodesktop' => $heroDesktop,
);
