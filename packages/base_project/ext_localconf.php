<?php
defined('TYPO3_MODE') || die();

# Add default RTE configuration
# ==============================
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['base_configuration'] = 'EXT:base_configuration/Configuration/RTE/Default.yaml';

# PageTS
# ==============================
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:base_project/Configuration/TsConfig/Page/All.tsconfig">');

# UserTS
# ==============================
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:base_project/Configuration/TsConfig/User/All.tsconfig">');
