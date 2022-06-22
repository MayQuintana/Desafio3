<?php

class LogController extends RestLoginController{
  
    
    //Funcion de inciar session 
    public function post_login(){

        $this->data= json_decode(file_get_contents('php://input'));

        if((new Usuarios())->auntenticar($this->data->pass, $this->data->nombre)){
        http_response_code(200);
        $this->data= ['message' =>'Iniciando session...','status'=>'Se ha iniciado session con exito'];

        }else {
        http_response_code(400);
        $this->data=['message' =>'Error!', 'status'=> ' Datos Incorrectos, Intente de Nuevo'];
        }
    }

        //Funcion cerrar session
    public function post_cerrar(){

        if((new Usuarios())->isAut()){
        Auth::destroy_identity();
        http_response_code(200);
        $this->data=['message' =>'Cerrando Session...','status'=>'Se ha cerrado session con exito'];

        }else{
            http_response_code(400);
            $this->data=['message' =>'Error!', 'status'=> ' No se puede cerrar session si no hay session activa!'];
        }
    }

    
}