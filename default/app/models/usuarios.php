<?php

class Usuarios extends ActiveRecord{

public function auntenticar($pass, $nombre){
 
    $auth= new Auth("model", "class: usuarios", "nombre: $nombre", "pass: $pass");


    return $auth->authenticate() ? true: false;

}

public function isAut(){

  return Auth::is_valid();

}

    
}
