<?php
/*
 * This file is part of the COMKOM° Typo3 Base Configuration
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
const LanguageFilePath = 'LLL:EXT:base_configuration/Resources/Private/Language/tca.xlf';

$defaultCropSettings = [
    'title' => LocalizationUtility::translate(LanguageFilePath.':tt_content.cropping.default', 'Default'),
    'allowedAspectRatios' => [
        'NaN' => [
            'title' => LocalizationUtility::translate(LanguageFilePath.':tt_content.cropping.ratio.free', 'NaN'),
            'value' => 0.0
        ],
        '16:9' => [
            'title' => '16:9',
            'value' => 16 / 9
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
$largeCropSettings['title'] = LocalizationUtility::translate(LanguageFilePath.':tt_content.cropping.l', 'L');
$mediumCropSettings = $defaultCropSettings;
$mediumCropSettings['title'] = LocalizationUtility::translate(LanguageFilePath.':tt_content.cropping.m', 'M');
$smallCropSettings = $defaultCropSettings;
$smallCropSettings['title'] = LocalizationUtility::translate(LanguageFilePath.':tt_content.cropping.s', 'S');

/*
 * Page media
 */

$defaultCropArea = [
    'x' => 0.0,
    'y' => 0.0,
    'width' => 1.5,
    'height' => 1,
];

// Keyvisual croppings

$mobile = [
    'title' => 'Mobile',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Annähernd quadratisch',
            'value' => 1.5 / 1
        ],
    ],
    'cropArea' => $defaultCropArea,
];

$medium = $mobile;
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
];

$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = array(
    'default' => $defaultCropSettings,
    'mobile' => $mobile,
    'medium' => $medium,
    'desktop' => $desktop,
);
$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default']['title'] = 'Social Media';

/*
 * Textmedia content element
 */
$GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['default'] = $defaultCropSettings;
