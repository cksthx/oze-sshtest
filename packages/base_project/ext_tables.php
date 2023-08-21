<?php
defined('TYPO3_MODE') || die();

$ext_key = 'base_project';
$GLOBALS['TBE_STYLES']['skins'][$ext_key]['stylesheetDirectories']['structure'] = 'EXT:' . ($ext_key) . '/Resources/Public/Css/Backend/';

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = [
    "loginLogo" => "EXT:base_theme/Resources/Public/Images/oze_logo_big.svg",
    "loginLogoAlt" => "Logo",
    "loginHighlightColor" => "rgb(0, 115, 165)",
    "loginBackgroundImage" => "EXT:base_theme/Resources/Public/Images/oze-2012-170-tiny.jpg",
    "backendLogo" => "",
];
