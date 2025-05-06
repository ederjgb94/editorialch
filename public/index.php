<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Verificar si se está accediendo a la ruta principal y redirigir a Astro
// $requestUri = $_SERVER['REQUEST_URI'] ?? '';
// if ($requestUri === '/' || $requestUri === '') {
//     // Redirigir al punto de entrada de Astro si existe
//     $astroEntryPath = __DIR__ . '/astro/server/entry.mjs';
//     if (file_exists($astroEntryPath)) {
//         // Intentar iniciar el servidor Astro si no está en ejecución
//         $command = 'node ' . $astroEntryPath . ' > /dev/null 2>&1 &';
//         exec($command);
        
//         // Redirigir al puerto donde se ejecuta Astro
//         header('Location: http://localhost:4321');
//         exit;
//     }
// }

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
