<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVXouLvX\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVXouLvX/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVXouLvX.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVXouLvX\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVXouLvX\App_KernelDevDebugContainer([
    'container.build_hash' => 'VXouLvX',
    'container.build_id' => '7a63b5c9',
    'container.build_time' => 1713278232,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVXouLvX');
