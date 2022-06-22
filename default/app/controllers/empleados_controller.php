<?php

class EmpleadosController extends RestController{


     //Obtiene todos los recursos del estado
    public function getAll(){

             $this->data= (new Empleados())->find();

    }
  

    //Obtiene todos los recursos de acuerdo con el paginador
    public function get_paginador($page=1, $ppage=5){
                 
           $this->data= (new Empleados())->paginate("page: $page","per_page: $ppage", 'order: id desc');
          
      }


    //funcion de obtener el recuerdo con id especificado
    public function get_recurso($id){

             if($this->data= (new Empleados())->find($id)){
             $this->data= (new Empleados())->find($id);
                 
            }else{
              http_response_code(400);
            $this->data=['message' =>'El registro no existe'];
              }

             }


      //Funcion Crear 
    public function put(){
        
          
             $data= json_decode(file_get_contents('php://input'));
             $nuevo= new Empleados();

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
            $editar= new Empleados();

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

           if($this->data= (new Empleados())->find($id)){
           if (!(new Empleados())->delete($id)) {

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
    // $this->data= (new Empleados())->find();


   }

}