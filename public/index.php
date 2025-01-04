<?php
declare(strict_types=1);

require_once __DIR__ ."/../vendor/autoload.php";

use App\Controller\IndexController;
use Core\Router;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

Router::get('/', [IndexController::class, 'index']);

Router::findRoute($uri);
