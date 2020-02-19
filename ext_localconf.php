<?php

/*
 * This file is part of the Project basic installation
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

$ext_config_path = 'EXT:project_configuration/Configuration/';

# TsConfig
# ======
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:' . $ext_config_path . 'TsConfig/Page.tsconfig">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:' . $ext_config_path . 'TsConfig/User.tsconfig">');

# Custom definition for rte
# =========================
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['custom'] = 'EXT:base_configuration/Configuration/YAML/CustomRte.yaml';
