<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:Kehet/meeper-kehet-com.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('65.109.3.33')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/meeper-kehet-com');

// Tasks

desc('Execute npm run build');
task('npm:build', function () {
    run('cd {{release_path}} && source ~/.nvm/nvm.sh && npm ci && npm run build');
});

// Hooks
after('deploy:failed', 'deploy:unlock');

after('deploy:update_code', 'npm:build');

