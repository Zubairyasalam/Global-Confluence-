<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = [
    '/awards',
    '/venue',
    '/sponsors',
    '/plenary-speakers',
    '/keynote-speakers',
    '/invited-speakers',
    '/key-dates'
];

foreach ($routes as $route) {
    try {
        $request = Illuminate\Http\Request::create($route, 'GET');
        $response = $kernel->handle($request);
        
        if ($response->getStatusCode() == 200) {
            echo "[OK] Route '$route' returned 200 successfully. Length: " . strlen($response->getContent()) . "\n";
        } else {
            echo "[WARN] Route '$route' returned status " . $response->getStatusCode() . "\n";
        }
    } catch (\Exception $e) {
        echo "[ERROR] Route '$route' threw an exception. " . $e->getMessage() . "\n";
    }
}
