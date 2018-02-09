<?php 

require 'AltoRouter.php';
$router = new AltoRouter();
$router->map('GET','/', 'home_controller#index', 'home');




$match = $router->match();
// not sure if code after this comment  is the best way to handle matched routes
list( $controller, $action ) = explode( '#', $match['target'] );

if ( is_callable(array($controller, $action)) ) {

    $obj = new $controller();
    call_user_func_array(array($obj,$action), array($match['params']));

} else if ($match['target']==''){
    echo 'Error: no route was matched'; 

} else {
    echo 'Error: can not call '.$controller.'#'.$action; 

}

class home_controller {
    public function index() {
      include "home.php";
      exit();
    }
    public function hello() {
      echo 'you are in dhaka';
    }
}

class content_controller {
  public function display_item($content) {
    print_r($content); // associative array with  
    echo 'hello from display_item';
  }
}