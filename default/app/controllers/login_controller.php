<?php

class LoginController extends AppController{

    public function index(){
        View::template('mystyle');
     

    }


    public function verifica(){

          View::select(null);
       // View::template(null);

        if(Input::post('pass') && Input::post('nombre')){

            $usuarioAutenticado = (new Usuarios());

            if($usuarioAutenticado->auntenticar(Input::post('pass'), Input::post('nombre'))){
                Redirect::to('estados');
            }else{
        
            Flash::error('Datos Incorrectos');
            }

        }

    }


    public function cerrar(){
        Auth::destroy_identity();
        Redirect::toAction('');
    }

}