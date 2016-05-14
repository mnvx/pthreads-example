<?php

/**
 * This example was created based on
 * https://github.com/krakjoe/pthreads/blob/master/examples/Pooling.php
 */

require_once("vendor/autoload.php");

require_once 'MyWorker.php';
require_once 'MyWork.php';
require_once 'MyDataProvider.php';

if (extension_loaded("pthreads")) {
    echo "Using pthreads" . PHP_EOL;
} else {
    echo "Using polyfill" . PHP_EOL;
}

$threads = 8;

// Create data provider. This service for example may read some data 
// from file or from database.
$provider = new MyDataProvider();

// Create pool of workers.
$pool = new Pool($threads, 'MyWorker', [$provider]);

$start = microtime(true);

// In this case our threads are balanced. 
// So it is good to create one thread per pool process.
$workers = $threads;
for ($i = 0; $i < $workers; $i++) {
    $pool->submit(new MyWork());
}

$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);
