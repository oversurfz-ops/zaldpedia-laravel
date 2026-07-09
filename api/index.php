<?php

if (isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
    $storageTmp = '/tmp/storage';
    $dirs = [
        $storageTmp,
        "$storageTmp/framework",
        "$storageTmp/framework/views",
        "$storageTmp/framework/cache",
        "$storageTmp/framework/cache/data",
        "$storageTmp/framework/sessions",
        "$storageTmp/logs"
    ];
    foreach ($dirs as $dir) {
        if (!file_exists($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}

// Forward Vercel requests to Laravel public entrypoint
require __DIR__ . '/../public/index.php';
