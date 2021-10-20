<?php

namespace App\Controllers;

//Se importa el modelo de datos
use App\Models\ProductoModelo;

class Productos extends BaseController{
    
    public function index(){
        return view('registroAnimal');
    }


    public function registrar(){
       
        //1. Recibo todos los datos enviados desde el formulario (vista)
        //Lo que tengo entre getPost("") es el name que puse a cada input
        $nombre=$this->request->getPost("nombre");
        $foto=$this->request->getPost("foto");
        $edad=$this->request->getPost("edad");
        $descripcion=$this->request->getPost("descripcion");
        $tipo=$this->request->getPost("tipo");

        //2. Valido que llego
        if($this->validate('nombre')){


            // 3 se organizan los datos en un array
            // los naranjados(claves)deben comincidir
            // con el nombre de las columns de nd

            $datos=array(

                "nombre"=>$producto,
                "foto"=>$foto,
                "edad"=>$precio,
                "descripcion"=>$descripcion,
                "tipo"=>$tipo
                
            );
            
            // intentemos grabar los datos en db

            try{
                $modelo=new AnimalModelo();
                $modelo->insert($datos);
                return redirect()->to(site_url('/productos/registro'))->with('mensaje',$error->getMessage());

            }catch(\Exception $error){
                return redirect()->to(site_url('/productos/registro'))->with('mensaje',"Exito agragando el producto");
            }

        }else{

            $mensaje="tienes datos pendientes";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje',$mensaje);

            //echo("tienes datos pendientes");

        }






    }

}
