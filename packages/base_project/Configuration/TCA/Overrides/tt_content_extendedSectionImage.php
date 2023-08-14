<?php
defined('TYPO3_MODE') || die();

/***************
 * Add crop variants
 */
$default = [
    'title' => 'Mobil, Tablet (XS, SM, MD)',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Annähernd quadratisch',
            'value' => 1.5 / 1
        ],
    ],
    'selectedRatio' => '1:1',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.5,
        'height' => 1,
    ],
];
$medium = $default;
$medium['title'] = 'Image (Tablet M)';
$desktop = $default;
$desktop = [
    'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.l',
    'allowedAspectRatios' => [
        '3:1' => [
            'title' => '3:1',
            'value' => 3 / 1
        ],
    ],
    'selectedRatio' => '1:1',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 3,
        'height' => 1,
    ],
];

// Hero croppings

$heroDefault = [
    'title' => 'Hero image (Phones, Tablets)',
    'allowedAspectRatios' => [
        '9:16' => [
            'title' => '9:16',
            'value' => 9 / 16
        ],
        'NaN' => [
            'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.ratio.free',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0,
        'y' => 0,
        'width' => 1,
        'height' => 1,
    ],
];

$heroDesktop = [
    'title' => 'Hero image (Desktops)',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => '16:9',
            'value' => 16 / 9
        ],
        'NaN' => [
            'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.ratio.free',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0,
        'y' => 0,
        'width' => 1,
        'height' => 1,
    ],
];

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = array(
    'default' => $default,
    'medium' => $medium,
    'desktop' => $desktop,
    'herodefault' => $heroDefault,
    'herodesktop' => $heroDesktop,
);

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['medium']['disabled'] = true;
$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['herodefault']['disabled'] = true;
$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['herodesktop']['disabled'] = true;