<?php

/**
 * Register application modules
 */
$application->registerModules([
    'frontend' => [
        'className' => 'Base\Frontend\Module',
        'path' => '../apps/frontend/Module.php',
    ],
    'backend' => [
        'className' => 'Base\Backend\Module',
        'path' => '../apps/backend/Module.php',
    ],
]);
