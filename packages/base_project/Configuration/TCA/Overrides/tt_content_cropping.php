<?php
/*
 * This file is part of the COMKOM° Typo3 Base Configuration
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;

$defaultCropSettings = [
    'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.default',
    'allowedAspectRatios' => [
        'NaN' => [
            'title' => 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.ratio.free',
            'value' => 0.0
        ],
        '16:9' => [
            'title' => '16:9',
            'value' => 16 / 9
        ],
        '16:10' => [
            'title' => '16:10',
            'value' => 16 / 10
        ],
        '4:3' => [
            'title' => '4:3',
            'value' => 4 / 3
        ],
        '3:2' => [
            'title' => '3:2',
            'value' => 3 / 2
        ],
        '1:1' => [
            'title' => '1:1',
            'value' => 1.0
        ],
        '9:16' => [
            'title' => '9:16',
            'value' => 9 / 16
        ],
        '10:16' => [
            'title' => '10:16',
            'value' => 10 / 16
        ],
        '3:4' => [
            'title' => '3:4',
            'value' => 3 / 4
        ],
        '2:3' => [
            'title' => '2:3',
            'value' => 2 / 3
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];

$largeCropSettings = $defaultCropSettings;
$largeCropSettings['title'] = 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.l';
$mediumCropSettings = $defaultCropSettings;
$mediumCropSettings['title'] = 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.m';
$smallCropSettings = $defaultCropSettings;
$smallCropSettings['title'] = 'LLL:EXT:base_contentelements/Resources/Private/Language/tca.xlf:tt_content.cropping.s';

$subNavigationCropSettings = [
    'title' => 'Subnavigation Image',
    'allowedAspectRatios' => [
        '16:9' => [
            'title' => '16:9',
            'value' => 16 / 9
        ],
    ],
    'selectedRatio' => '16:9',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];

/*
 * Page media
 */
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['subNavigation'] = $subNavigationCropSettings;

/*
 * Textmedia content element
 */
$GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;

