<?php

ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', 1);

include 'vendor/autoload.php';
include 'v1/API.php';
include 'dist/ItemHandler.php';

use RestService\Server;

Server::create('/')
    ->addGetRoute('test', function(){
        return 'Yay!';
    })
    ->addGetRoute('items/(.*)', function($id){
      $itemHandler = new ItemHandler();
      $item = $itemHandler->getItems($id);
      return array('item' => $item);
    })
->run();

/*
Server::create('/v1', 'API')
    ->collectRoutes()
->run();
*/

?>
