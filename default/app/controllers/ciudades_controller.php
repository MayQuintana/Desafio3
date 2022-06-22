<?php

class CiudadesController extends RestController{


     //Obtiene todos los recursos del estado
    public function getAll(){

             $this->data= (new Ciudades())->find();

    }
  

    //Obtiene todos los recursos de acuerdo con el paginador
    public function get_paginador($page=1, $ppage=5){
                 
           $this->data= (new Ciudades())->paginate("page: $page","per_page: $ppage", 'order: id desc');
          
      }


    //funcion de obtener el recuerdo con id especificado
    public function get_recurso($id){

             if($this->data= (new Ciudades())->find($id)){
             $this->data= (new Ciudades())->find($id);
                 
            }else{
              http_response_code(400);
            $this->data=['message' =>'El registro no existe'];
              }

             }


      //Funcion Crear 
    public function put(){
        
          
             $data= json_decode(file_get_contents('php://input'));
             $nuevo= new Ciudades();

             if($data != null){

             foreach ($data as $key => $nuevoDato){
                $nuevo-> $key= $nuevoDato; 

             }
                $nuevo->save();
          
             http_response_code(200);
             $this->data=['message' =>'El registro ha sido creado'];

             }else{

                http_response_code(400);
                $this->data=['message' =>'Error!', 'status'=> 'No se puede registrar debido a que el campo esta vacio!'];
             }

    }
    
    //Funcion de editar 
     public function patch($id){

        
            $data= json_decode(file_get_contents('php://input'));
            $editar= new Ciudades();

            if($this->data=($editar->find($id))){
            if($data != null){
           
            foreach ($data as $key => $id){
              $editar-> $key= $id; 
             
            }
           
            $editar->update();
 
            http_response_code(200);
            $this->data=['message' =>'El registro ha sido editado'];

            }else{

            http_response_code(400);
            $this->data=['message' =>'Error!', 'status'=> 'Debe de ingresar los datos para editar!'];
            }
        }else{

            http_response_code(400);
            $this->data=['message' =>'El registro no existe'];
        }

           }


   //Funcion de eliminar 
   public function delete($id){

           if($this->data= (new Ciudades())->find($id)){
           if (!(new Ciudades())->delete($id)) {

           http_response_code(400);
           $this->data=['message' => 'Error! No existe, Intente de Nuevo'];
         }

           http_response_code(200);
           $this->data=['message' => 'Eliminado con exito'];

        
        }else{
         http_response_code(400);
      $this->data=['message' =>'El registro no existe'];

        
    }
}


    //Funcion Respuesta
   public function post(){

     $this->data= json_encode(file_get_contents('php://input'));
    // $this->data= (new Ciudades())->find();


   }

}