<?php

namespace Demo\Sandbox;

/**
 * Autoloader
 *
 * @return $app \Composer\Autoload\ClassLoader
 *
 * @global $appDir
 * @global $packageDir
 */

$appDir = dirname(__DIR__);
$packageDir = dirname(dirname($appDir));

// Hierarchical profiler @see http://www.php.net/manual/en/book.xhprof.php
// require $packageDir . '/var/lib/profile.php';

$loader = require $packageDir . '/vendor/autoload.php';
/** @var $loader \Composer\Autoload\ClassLoader */

\BEAR\Bootstrap\registerLoader(
    $loader,
    __NAMESPACE__,
    $appDir
);

return $loader;
