<?php

require_once 'config.php';
require_once 'core/system.php';

header("Cache-Control: max-age=200");

//use vendor\voku\helper\HtmlMin;

//$htmlMin = new HtmlMin();

Registry::set("root", dirname(__FILE__) . '/');

$router = new Router();
$router->parseRoute();

// UTM
$utm_source = $_GET['utm_source'];
$utm_medium = $_GET['utm_medium'];
$utm_campaign = $_GET['utm_campaign'];
$utm_content = $_GET['utm_content'];
$utm_term = $_GET['utm_term'];

UTM::registerHit($utm_source, $utm_medium, $utm_campaign, $utm_content, $utm_term);
// End UTM

$db = new Database(DB_NAME, DB_USER, DB_PASSWORD, DB_HOST);

$controller = $router->createController();
$controller->render();
?>