<?php

use PhpSPA\App;
use PhpSPA\Compression\Compressor;
use PhpSPA\Http\Response;

$app = new App(require 'layout/Layout.php')
   ->attach(require 'pages/HomePage.php')
   ->attach(require 'pages/AboutPage.php')

   // --- Add metadata information ---
   ->meta(charset: 'UTF-8')
   ->meta(name: 'viewport', content: 'width=device-width, initial-scale=1.0')

   ->link(content: '/dist/tailwind.css');

// --- Enable Compressing ---
if (getenv('APP_ENV') === 'production') $app->compression(Compressor::LEVEL_EXTREME);


$app
   ->defaultTargetID('app')
   ->run();

// --- NO ROUTES FOUND ---
Response::sendError('404 Not Found', Response::StatusNotFound);
