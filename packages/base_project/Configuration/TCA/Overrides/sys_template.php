<?php
defined('TYPO3_MODE') || die();

call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'base_project';

    /**
     * Default TypoScript for BaseProject
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Base Project'
    );
});

$GLOBALS['TCA']['tt_content']['containerConfiguration']['extendedSection']['backendTemplate'] = 'EXT:base_project/Resources/Private/Templates/ContentElements/Backend/ExtendedSection.html';