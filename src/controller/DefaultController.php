<?php

require_once routeLibs.'View.php';

class DefaultController{

  public function home(){
    view('home.html');
  }

  public function notFound($message = 'Error 404 - Not Found'){
    $data['message'] = $message;
    view('notFound.php', $data);
  }

}

?>