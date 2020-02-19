<?php

/*
 * This file is part of the Project basic installation
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$ext_key = 'project_configuration';

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('project_configuration', 'Configuration/TypoScript', 'Project Configuration');
    }
);
