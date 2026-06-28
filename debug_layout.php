<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$compiler = app('blade.compiler');
$source   = file_get_contents(resource_path('views/layouts/invitation.blade.php'));
$compiled = $compiler->compileString($source);

file_put_contents(__DIR__ . '/storage/compiled_layout.php', $compiled);
$lines = explode("\n", $compiled);
echo "Compiled " . count($lines) . " lines\n";

// Show lines 110-130 (around the error at line 119)
echo "\n--- Lines 110-130 ---\n";
for ($i = 109; $i <= min(129, count($lines)-1); $i++) {
    echo ($i+1) . ": " . $lines[$i] . "\n";
}
