<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

class Catalogo extends PublicController{
    public function run():void{
        $data=array();
        $data["productos"]=array();
        $data["mode"]=isset($_GET["mode"])?$_GET["mode"]:0;
        
        switch($data["mode"]){
            case 1: 
                $codigo_categoria=1;
                   $tmp=\Dao\productos::getAllProductos($codigo_categoria);
                   foreach($tmp as $items){
                    $data["productos"][]=$items;
                }
                    break; 
            case 2: 
                $codigo_categoria=2;
                   $tmp=\Dao\productos::getAllProductos($codigo_categoria);
                   foreach($tmp as $items){
                    $data["productos"][]=$items;
                }
                    break; 
            case 3:
                $codigo_categoria=3;
                   $tmp=\Dao\productos::getAllProductos($codigo_categoria);
                   foreach($tmp as $items){
                    $data["productos"][]=$items;
                }
                    break; 
        }

        $time=time();
        $token=md5("productos".$time);
        $_SESSION["productos_xss_token"]=$token;
        $_SESSION["productos_xss_token_tts"]=$time; 

        $data["id"]=0;
        $data["codigo_carrito"]="";
        $data["codigo_producto"]="";
        $data["descripcion_producto"]="";
        $data["cantidad"]=1;
        $data["precio"]="";
        $data["cantidad_stock"]="";

        if(isset($_POST["btnComprar"])){
            $data["codigo_producto"]=$_POST["codigo_producto"];
            $data["cantidad"]=isset($_POST["cantidad"])?$_POST["cantidad"]:0;
            $data["precio"]=$_POST["precio"];
            $data["cantidad_stock"]=$_POST["cantidad_stock"];
            
            $tmpProducto=\Dao\carrito::StockProduct($data["codigo_producto"]);
            $estado=\Dao\carrito::getCarritoId();
            if($estado==null){
                $Cart=\Dao\carrito::AddCart();
                $Detail=\Dao\carrito::AddCartDetail(
                    $registros["codigo_producto"]=$data["codigo_producto"],
                    $registros["cantidad"]=$_POST["cantidad"],
                    $registros["precio"]=$_POST["precio"]
                );
                if($Cart && $Detail){
                 
                 \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_carrito",
                    "Categoria eliminada exitosamente :)"
                );
             }
 
            } else{
             $Detail=\Dao\carrito::AddCartDetail(
                 $registros["codigo_producto"]=isset($_POST["codigo_producto"])?$_POST["codigo_producto"]:0,
                 $registros["cantidad"]=isset($_POST["cantidad"])?$_POST["cantidad"]:0,
                 $registros["precio"]=isset($_POST["precio"])?$_POST["precio"]:0
             );
             if($Detail){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_carrito",
                    "Categoria eliminada exitosamente :)"
                );
             }
            }

           

            /*if($data["cantidad_stock"]==10){
                echo "<script> alert(Se pudo)</script>";
            }
           
            if($data["cantidad_stock"]>$data["cantidad"]){
                echo "<script> alert(Se pudo)</script>";
            }*/

        

        }
     
   
        
        \Views\Renderer::render("mnt/productoclient",$data);
    }
}
?>