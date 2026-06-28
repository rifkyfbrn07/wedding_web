<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Test full page via HTTP kernel simulation
$invitation = \App\Models\Invitation::first();
$seo   = ['title' => 'Test', 'description' => 'Test'];
$guest = null;

// Compile the show view
$compiler = app('blade.compiler');
$showSrc  = file_get_contents(resource_path('views/invitation/show.blade.php'));
$compiled = $compiler->compileString($showSrc);
echo "=== show.blade.php compiled ===\n" . $compiled . "\n\n";

// Try rendering the show view
try {
    $html = view('invitation.show', compact('invitation', 'seo', 'guest'))->render();
    echo "SUCCESS: rendered " . strlen($html) . " bytes\n";
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "FILE:  " . $e->getFile() . ":" . $e->getLine() . "\n";

    // Show the compiled cache file around error line
    if (preg_match('/\[(\w+\.php)\]/', $e->getMessage(), $m)) {
        $cachePath = storage_path('framework/views/' . $m[1]);
        if (file_exists($cachePath)) {
            $lines = file($cachePath);
            $errLine = $e->getLine();
            $start = max(0, $errLine - 10);
            $end   = min(count($lines) - 1, $errLine + 5);
            echo "\n--- Cached view lines " . ($start+1) . "-" . ($end+1) . " ---\n";
            for ($i = $start; $i <= $end; $i++) {
                echo ($i+1) . ": " . $lines[$i];
            }
        }
    }
}
