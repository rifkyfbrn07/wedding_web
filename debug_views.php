<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$inv = \App\Models\Invitation::first();

$components = [
    'components.cover'      => ['invitation' => $inv, 'guest' => null],
    'components.hero'       => ['invitation' => $inv],
    'components.couple'     => ['invitation' => $inv],
    'components.countdown'  => ['invitation' => $inv],
    'components.event'      => ['invitation' => $inv],
    'components.gallery'    => ['invitation' => $inv],
    'components.rsvp'       => ['invitation' => $inv, 'guest' => null],
    'components.wishes'     => ['invitation' => $inv],
    'components.sidebar'    => ['invitation' => $inv],
    'components.mobile-nav' => [],
    'components.music-player' => ['invitation' => $inv],
];

foreach ($components as $view => $data) {
    try {
        view($view, $data)->render();
        echo "✓ {$view}\n";
    } catch (\Throwable $e) {
        echo "✗ {$view}: " . $e->getMessage() . " [" . basename($e->getFile()) . ":" . $e->getLine() . "]\n";
    }
}

echo "\nFull page test:\n";
try {
    $invitation = \App\Models\Invitation::first();
    $seo = ['title' => 'Test', 'description' => 'Test'];
    $guest = null;
    view('layouts.invitation', compact('invitation', 'seo', 'guest'))
        ->render();
    echo "✓ layouts.invitation OK\n";
} catch (\Throwable $e) {
    echo "✗ layouts.invitation: " . $e->getMessage() . " [" . basename($e->getFile()) . ":" . $e->getLine() . "]\n";
}
