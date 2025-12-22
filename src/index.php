<?php

use PhpSPA\App;
use PhpSPA\Compression\Compressor;
use PhpSPA\Http\Response;

new App(require 'layout/Layout.php')
   ->attach(require 'pages/HomePage.php')
   ->attach(require 'pages/AboutPage.php')

   // --- Add metadata information ---
   ->meta(charset: 'UTF-8')
   ->meta(name: 'viewport', content: 'width=device-width, initial-scale=1.0')

   ->link(content: '/dist/tailwind.css')

   // --- Enable Compressing based on the app environment ---
   ->compressionEnvironment(getenv('APP_ENV') ?: 'development')

   ->defaultTargetID('app')
   ->run();

// --- NO ROUTES FOUND ---
Response::sendError('404 Not Found', Response::StatusNotFound);
