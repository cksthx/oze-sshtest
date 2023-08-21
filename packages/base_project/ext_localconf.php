<?php
defined('TYPO3_MODE') || die();

# Hooks
# =====
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['base_project'] =
    \Comkom\BaseProject\Hooks\PageLayoutView\ContentElementsPreviewRenderer::class;

# Add default RTE configuration
# ==============================
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['base_project'] = 'EXT:base_project/Configuration/RTE/Default.yaml';

# PageTS
# ==============================
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:base_project/Configuration/TsConfig/Page/All.tsconfig">');

# UserTS
# ==============================
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:base_project/Configuration/TsConfig/User/All.tsconfig">');
