<?php

namespace Deployer;

# Call default recipe
require 'recipe/common.php';
require 'recipe/rsync.php';

# Project name
set('application', 'startsmart-project');

# Define Git-Repository
set('repository', 'git@github.com:made-by-comkom/oze-website.git');

# [Optional] Allocate tty for git clone. The default value is false.
set('git_tty', true);

# Set maximum releases backup
set('keep_releases', 5);

# To solve this issue: Can't detect http user name. Please set up the `http_user` config parameter.
set('writable_mode', 'chmod');
set('use_relative_symlink', '0');

// set('composer_action', 'install');
// set('update_code_strategy', 'clone');

# set('bin/composer', '/usr/local/bin/composer');
# set('bin/php', '/usr/local/bin/php');

# Set Server
inventory('.hosts.yaml');

# DocumentRoot / WebRoot for the TYPO3 installation
set('typo3_webroot', 'public');

# Shared directories
set('shared_dirs', [
   '{{typo3_webroot}}/media',
   '{{typo3_webroot}}/fileadmin',
   '{{typo3_webroot}}/typo3temp',
   '{{typo3_webroot}}/uploads',
   'packages/base_theme/Resources/Public'
]);

# Shared files
set('shared_files', [
   '{{typo3_webroot}}/.htaccess',
   '{{typo3_webroot}}/typo3conf/LocalConfiguration.php',
   // '{{typo3_webroot}}/typo3conf/scheduler.sh',
   'config/sites/comkom-start-smart/config.yaml',
   // '{{typo3_webroot}}/typo3conf/AdditionalConfiguration.php',
   '{{typo3_webroot}}/favicon.ico'
]);

# Writeable directories
set('writable_dirs', [
   'config',
   'var',
   '{{typo3_webroot}}/media',
   '{{typo3_webroot}}/fileadmin',
   '{{typo3_webroot}}/typo3temp',
   '{{typo3_webroot}}/typo3conf',
   '{{typo3_webroot}}/uploads'
]);

# rsync config
set('rsync',[
   'exclude'      => [
       '.git',
       '.DS_Store',
   ],
   'exclude-file' => false,
   'include'      => [],
   'include-file' => false,
   'filter'       => [],
   'filter-file'  => false,
   'filter-perdir'=> false,
   'flags'        => 'rz', // Recursive, with compress
   'options'      => ['delete'],
   'timeout'      => 60,
]);

set('rsync_src', './packages/base_theme/Resources/Public');
set('rsync_dest','{{release_path}}/packages/base_theme/Resources/Public');

# Main TYPO3 task
task('deploy', [
   'deploy:info',
   'deploy:prepare',
   'deploy:lock',
   'deploy:release',
   'deploy:update_code',
   'deploy:shared',
   'deploy:vendors',
   'deploy:writable',
   'deploy:symlink',
   'rsync',
   'deploy:unlock',
   'cleanup',
])->desc('Deploy your project');
after('deploy', 'success');

# [Optional] If the deployment fails automatically unlock.
after('deploy:failed', 'deploy:unlock');