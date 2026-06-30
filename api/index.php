<?php

$basePath = dirname(__DIR__);
$storagePath = '/tmp/storage';
$databasePath = '/tmp/database.sqlite';
$databaseTemplate = $basePath . '/database/vercel.sqlite';

foreach ([
    $storagePath . '/app/public',
    $storagePath . '/framework/cache',
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
] as $key => $value) {
    putenv($key . '=' . $value);
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

require $basePath . '/public/index.php';
