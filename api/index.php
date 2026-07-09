<?php

// Writable storage directories for Vercel cloud environment
if (isset($_SERVER['VERCEL']) || env('VERCEL')) {
    $storageTmp = '/tmp/storage';
    if (!file_exists($storageTmp)) {
        @mkdir($storageTmp, 0755, true);
        @mkdir("$storageTmp/framework/views", 0755, true);
        @mkdir("$storageTmp/framework/cache/data", 0755, true);
        @mkdir("$storageTmp/framework/sessions", 0755, true);
        @mkdir("$storageTmp/logs", 0755, true);
    }
}

// Forward Vercel requests to Laravel public entrypoint
require __DIR__ . '/../public/index.php';
