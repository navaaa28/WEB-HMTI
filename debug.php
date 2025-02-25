<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    require __DIR__.'/vendor/autoload.php';
    echo "Autoload OK\n";
    
    $app = require_once __DIR__.'/bootstrap/app.php';
    echo "Bootstrap OK\n";
    
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    echo "Kernel OK\n";
    
    $status = $kernel->handle(
        $input = new Symfony\Component\Console\Input\ArgvInput,
        new Symfony\Component\Console\Output\ConsoleOutput
    );
    echo "Handle OK\n";
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
}