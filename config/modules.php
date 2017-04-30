<?php

/**
 * Register application modules
 */
$application->registerModules([
    'frontend' => [
        'className' => 'Base\Frontend\Module',
        'path' => '../apps/modules/frontend/Module.php',
    ],
    'backend' => [
        'className' => 'Base\Backend\Module',
        'path' => '../apps/modules/backend/Module.php',
    ],
]);

// 设置默认module
$application->setDefaultModule('frontend');


