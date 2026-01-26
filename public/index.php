<?php

/**
 * ---------------------------------------------------------------
 * Public HTTP Entry Point
 * ---------------------------------------------------------------
 * Handles every web request, bootstraps the environment,
 * then passes control to the app kernel.
 */

$app = require __DIR__ . '/../bootstrapper/entry.php';
/**
 * If broadcasting failed. Means your local development is not configure for ssl.
 * Download cacert.pem
 * https://curl.se/ca/cacert.pem
 * 
 * Uncomment phpinfo() and find the line below:
 * 
 * Loaded Configuration File C:\php\php.ini
 * 
 * locate the php.ini base on the configured setup.
 * 
 * Open C:\php\php.ini and find these lines:
 * ;curl.cainfo =
 * ;openssl.cafile =
 * 
 * 
 * or better to add inside ssl folder
 * 
 * curl.cainfo = "C:\php\certs\cacert.pem"
 * openssl.cafile = "C:\php\certs\cacert.pem"
 * 
 */
// phpinfo();
// var_dump(openssl_get_cert_locations());
// dd($app);
$app->run();
