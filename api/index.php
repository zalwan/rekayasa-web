<?php

$basePath = dirname(__DIR__);
$storagePath = '/tmp/storage';
$bootstrapCachePath = '/tmp/bootstrap-cache';
$databasePath = '/tmp/database.sqlite';
$databaseTemplate = $basePath . '/database/vercel.sqlite';

foreach ([
    $bootstrapCachePath,
    $storagePath . '/app/public',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
] as $directory) {
    if (! is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}

if (! file_exists($databasePath) && file_exists($databaseTemplate)) {
    copy($databaseTemplate, $databasePath);
}

foreach ([
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_STORAGE_PATH' => $storagePath,
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $databasePath,
    'SESSION_DRIVER' => 'file',
    'CACHE_STORE' => 'file',
    'QUEUE_CONNECTION' => 'sync',
    'VIEW_COMPILED_PATH' => $storagePath . '/framework/views',
    'APP_PACKAGES_CACHE' => $bootstrapCachePath . '/packages.php',
    'APP_SERVICES_CACHE' => $bootstrapCachePath . '/services.php',
    'LOG_CHANNEL' => 'stderr',
] as $key => $value) {
    putenv($key . '=' . $value);
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

require $basePath . '/public/index.php';
