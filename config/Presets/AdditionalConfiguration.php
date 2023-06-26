<?php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_DE.UTF-8';

switch (\TYPO3\CMS\Core\Core\Environment::getContext()) {
    case 'Development':
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
        $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

        $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array_merge(
            isset($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'])
            ? $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']
            : [],
            [
                'charset' => 'utf8mb4',
                'dbname' => 'startsmart_made_by_comkom',
                'driver' => 'mysqli',
                'host' => 'localhost',
                'password' => 'root',
                'tableoptions' => [
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
                ],
                'user' => 'root',
            ]
        );
        break;

    case 'Production/Staging':
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 0;
        $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

        $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array_merge(
            isset($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'])
            ? $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']
            : [],
            [
                'charset' => 'utf8mb4',
                'dbname' => 'usr_p615504_1',
                'driver' => 'mysqli',
                'host' => 'db000902.mydbserver.com',
                'password' => 'eaqju+l21s-Ybv',
                'tableoptions' => [
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
                ],
                'user' => 'p615504',
            ]
        );
        break;

    case 'Production/Live':
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 0;
        $GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

        $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array_merge(
            isset($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'])
            ? $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']
            : [],
            [
                'charset' => 'utf8mb4',
                'dbname' => 'usr_p615504_2',
                'driver' => 'mysqli',
                'host' => 'db000902.mydbserver.com',
                'password' => 'eaqju+l21s-Ybv',
                'tableoptions' => [
                    'charset' => 'utf8mb4',
                    'collate' => 'utf8mb4_unicode_ci',
                ],
                'user' => 'p615504',
            ]
        );
        break;
}