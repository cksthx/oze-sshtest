<?php
defined('TYPO3_MODE') || die();

$ext_key = 'base_project';
$GLOBALS['TBE_STYLES']['skins'][$ext_key]['stylesheetDirectories']['structure'] = 'EXT:' . ($ext_key) . '/Resources/Public/Css/Backend/';

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = [
    "loginLogo" => "EXT:base_project/Resources/Public/Images/logo.svg",
    "loginLogoAlt" => "Logo",
    "loginHighlightColor" => "rgba(52, 58, 64, 1)",
    "loginBackgroundImage" => "EXT:base_project/Resources/Public/Images/pexels-sound-on-3761306-oranje-tiny.jpg",
    "backendLogo" => "",
    "loginFootnote" => "© Foto von Sound On von Pexels, https://www.pexels.com/de-de/@sound-on"
];
