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

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = array(
    'default' => $default,
    'desktop' => $desktop,
);

$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['medium']['disabled'] = true;
$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['herodefault']['disabled'] = true;
$GLOBALS['TCA']['tt_content']['types']['extendedSectionImage']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['herodesktop']['disabled'] = true;