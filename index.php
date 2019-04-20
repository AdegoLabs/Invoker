<?php
require_once('XHEActor.php');
require_once('Collection.php');
require_once('CollectionAction.php');
$xhe_host = "127.0.0.1:7011";
require_once("../../Templates/xweb_human_emulator.php");

$action = new CollectionAction(array($browser, 'navigate'), array('google.com'));
$action2 = new CollectionAction(array($browser, 'navigate'), array('bing.com'));
$actor = new XHEActor($action);
$actor2 = new XHEActor($action2);

//$actor->init();

$c = new Collection();
$c->addItem($actor, "navigate Google");
$c->addItem($actor2, "navigate Bing");
$c->deleteItem("navigate Bing");

var_dump($c);

$app->quit();
?>
