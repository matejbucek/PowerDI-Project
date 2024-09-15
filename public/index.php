<?php
require '../vendor/autoload.php';
use App\Kernel;
use PowerDI\HttpBasics\HttpRequest;

$kernel = new Kernel();

$request = HttpRequest::createFromGlobas();
$response = $kernel->handle($request);
$response->send();