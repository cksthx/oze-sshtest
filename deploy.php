<?php

namespace Deployer;

# Call default recipe
require 'recipe/common.php';
require 'contrib/rsync.php';

# Project name
set('application', 'startsmart-project');

# Define Git-Repository
set('repository', 'git@github.com:cksthx/oze-sshtest.git');

# Set maximum releases backup
set('keep_releases', 5);

# To solve this issue: Can't detect http user name. Please set up the `http_user` config parameter.
set('writable_mode', 'chmod');
// set('use_relative_symlink', '0');

set('composer_action', 'install');
set('update_code_strategy', 'clone');

set('bin/php', '/home/www/p702307/cd ..bin/php');
set('bin/composer', '/usr/local/composer/bin/composer');

/**
 * Path to TYPO3 cli
 */
set('bin/typo3cms', '{{release_path}}/vendor/bin/typo3');

# Set Server
import('.hosts.yaml');

# DocumentRoot / WebRoot for the TYPO3 installation
set('typo3_webroot', 'public');

# Shared directories
set('shared_dirs', [
   '{{typo3_webroot}}/media',
   '{{typo3_webroot}}/fileadmin',
   '{{typo3_webroot}}/typo3temp',
   '{{typo3_webroot}}/uploads',
   'var/session',
   'var/log',
   'var/lock',
   'var/charset',
]);

# Shared files
set('shared_files', [
   '{{typo3_webroot}}/.htaccess',
   'config/system/settings.php',
   'config/sites/comkom-start-smart/config.yaml',
   'config/sites/comkom-start-smart/csp.yaml',
   '{{typo3_webroot}}/favicon.ico'
]);

# Writeable directories
set('writable_dirs', [
   'config',
   '{{typo3_webroot}}/media',
   '{{typo3_webroot}}/fileadmin',
   '{{typo3_webroot}}/typo3temp',
   '{{typo3_webroot}}/typo3conf',
   '{{typo3_webroot}}/uploads',
   'var',
]);

# rsync config
set('rsync',[
   'exclude'      => [
      // OS specific files
      '.DS_Store',
      'Thumbs.db',
      // Project specific files and directories
      '.editorconfig',
      '.fleet',
      '.Build',
      '.git',
      '.ddev',
      '.deployer',
      '.idea',
      '.npm',
      '.php-cs-fixer.dist.php',
      '.vscode',
      'auth.json',
      'deploy.php',
      '.npmrc',
      '.hosts.yaml',
      'phpstan.neon',
      'phpunit.xml',
      'README*',
      'rector.php',
      'typoscript-lint.yml',
      '/.deployment',
      '/**/Tests/*',
      'package.json',
      'package-lock.json',
      'yarn.lock',
      'node_modules/',
      'var/',
      'public/fileadmin/',
      'public/media/',
      'public/typo3temp/',
      'config/system/additional.php',
   ],
   'exclude-file' => false,
   'include' => ['vendor'],
   'include-file' => false,
   'filter'       => [],
   'filter-file'  => false,
   'filter-perdir'=> false,
   'flags'        => 'rz', // Recursive, with compress
   'options'      => ['delete'],
   'timeout'      => 600,
]);

set('rsync_src', './packages/base_project/Resources/Public');
set('rsync_dest','{{release_path}}/packages/base_project/Resources/Public');

// TYPO3 tasks
desc('Fix permissions');
task('deploy:fix-permissions', function () {
   run('find {{release_path}} -type f -exec chmod 644 {} +');
   run('find {{release_path}} -type d -exec chmod 755 {} +');
});

desc('Warm up caches');
task('typo3:cache_warmup', function () {
   run('{{bin/typo3cms}} cache:warmup --group system');
});

desc('Flush all caches');
task('typo3:cache_flush', function () {
   run('{{bin/typo3cms}} cache:flush --group pages');
});

desc('Set up all installed extensions');
task('typo3:extension_setup', function () {
   run('{{bin/typo3cms}} extension:setup');
});

desc('Fix folder structure');
task('typo3:fix_folder_structure', function () {
   run('{{bin/typo3cms}} install:fixfolderstructure');
});

desc('Update language files');
task('typo3:language_update', function () {
   run('{{bin/typo3cms}} language:update');
});

// Register TYPO3 tasks
before('deploy:symlink', function () {
   invoke('typo3:fix_folder_structure');
   invoke('typo3:cache_warmup');
   invoke('typo3:extension_setup');
   invoke('typo3:language_update');
});
after('deploy:symlink', 'deploy:fix-permissions', function () {
   invoke('typo3:cache_flush');
});

# Main TYPO3 task
desc('Deploys your project');
task('deploy', [
   'deploy:info',
   'deploy:setup',
   'deploy:lock',
   'deploy:release',
   'deploy:update_code',
   'rsync',
   'deploy:shared',
   'deploy:vendors',
   'deploy:writable',
   'deploy:symlink',
   'deploy:unlock',
   'deploy:cleanup',
]);
after('deploy', 'deploy:success');

# [Optional] If the deployment fails automatically unlock.
after('deploy:failed', 'deploy:unlock');