<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;

class productoclient extends PublicController{
    
    public function run():void{
        $registros=array();
        $data=array();
        $data["productos"]=array();
        $tmp=\Dao\productos::getAllProductos();
        foreach($tmp as $tmpitems){
            $data["productos"][]=$tmpitems;
        }

        $time=time();
        $token=md5("productos".$time);
        $_SESSION["productos_xss_token"]=$token;
        $_SESSION["productos_xss_token_tts"]=$time; 

        $registros["id"]=0;
        $registros["codigo_carrito"]="";
        $registros["codigo_producto"]="";
        $registros["nombre_producto"]="";
        $registros["descripcion_producto"]="";
        $registros["cantidad"]=1;
        $registros["precio"]="";
       
        
        if(isset($_POST["btnComprar"])){
        
           $estado=\Dao\carrito::getCarritoId();    
           if($estado==null){
               $Cart=\Dao\carrito::AddCart();
               $Detail=\Dao\carrito::AddCartDetail(
                   $registros["codigo_producto"]=$_POST["codigo_producto"],
                   $registros["cantidad"]=$_POST["cantidad"],
                   $registros["precio"]=$_POST["precio"]
               );
               if($Cart && $Detail){
                echo '<script>alert("Se Inserto a la carretilla")</script>';
            }

           } else{
            $Detail=\Dao\carrito::AddCartDetail(
                $registros["codigo_producto"]=isset($_POST["codigo_producto"])?$_POST["codigo_producto"]:0,
                $registros["cantidad"]=isset($_POST["cantidad"])?$_POST["cantidad"]:0,
                $registros["precio"]=isset($_POST["precio"])?$_POST["precio"]:0
            );
            if($Detail){
                echo '<script>alert("Se Inserto a la carretilla")</script>';
            }
           }
           
              

        
        }
        

        \Views\Renderer::render("mnt/productoclient",$data);

        
    }
}
?>