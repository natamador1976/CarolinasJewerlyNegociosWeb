<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

class producto extends PublicController{
    public function run():void{
        \Utilities\Site::addLink("public/css/style.css");

        $data=array();

        $ModalTitle=array(
            "INS"=>"Nuevo Hero Panel",
            "UPD"=>"Actualiza %s - %s",
            "DSP"=>"Detalle de %s - %s",
            "DEL"=>"Eliminaod %s - %s"
        );

        $data["ModalTitle"]="";
        $data["codigo_producto"]=0;
        $data["nombre_producto"]="";
        $data["descripcion_producto"]="";
        $data["precio"]="";
        $data["cantidad_stock"]="";
        $data["codigo_categoria"]="";
        $data["codigo_tipo_producto"]="";
        $data["uri_img"]="";
        $data["showCommitBtn"]=true;
        $data["readonly"]="";


        //POSTBACK
        if($this->isPostBack()){
            $data["mode"]=$_POST["mode"];
            $data["codigo_producto"]=$_POST["codigo_producto"];
            $data["token"]=$_POST["token"];
            $this->verificarToken();

            if($data["token"] != $_SESSION["productos_xss_token"]){
                $time=time();
              $token=md5("productos".$time);
              $_SESSION["productos_xss_token"]=$token;
              $_SESSION["productos_xss_token_tts"]=$time;

              \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_productos",
                "Algo sucedio mal intente de nuevo :("
            );
            }

           if($data["mode"]!='DEL'){
               $data["nombre_producto"]=$_POST["nombre_producto"];
               $data["descripcion_producto"]=$_POST["descripcion_producto"];
               $data["precio"]=$_POST["precio"];
               $data["cantidad_stock"]=$_POST["cantidad_stock"];
               $data["codigo_categoria"]=$_POST["codigo_categoria"];
               $data["codigo_tipo_producto"]=$_POST["codigo_tipo_producto"];
           }

           switch($data["mode"]){
               case 'INS':
                            $ruta="img_prd/".$_POST["codigo_producto"].'/'.$_FILES["uri_img"]["name"];
                            $ToGo="img_prd/".$_POST["codigo_producto"].'/';
                            if(move_uploaded_file($ruta, $_FILES["uri_img"]["tmp_name"])){
                                $ok=\Dao\productos::AddProduct(
                                    $data["nombre_producto"],
                                    $data["descripcion_produto"],
                                    $data["precio"],
                                    $data["cantidad_stock"],
                                    $data["codigo_categoria"],
                                    $data["codigo_tipo_producto"],
                                    $ruta
                                );
                                if($ok){
                                    \Utilities\Site::redirectToWithMsg(
                                        "index.php?page=mnt_productos",
                                        "Prodcuto agregado Exitosamente"
                                    );
                                }
                            }else{
                                \Utilities\Site::redirectToWithMsg(
                                    "index.php?page=mnt_productos",
                                    "Problema al guardar la imagen"
                                );
                            }
                            break;
               case 'UPD':
                            $ruta="img_prd/".$_POST["codigo_producto"].'/'.$_FILES["uri_img"]["name"];
                            $ToGo="img_prd/".$_POST["codigo_producto"].'/';
                            if(move_uploaded_file($ruta, $_FILES["uri_img"]["tmp_name"])){
                            $ok=\Dao\productos::UpdateProduct(
                                $data["nombre_producto"],
                                $data["descripcion_produto"],
                                $data["precio"],
                                $data["cantidad_stock"],
                                $data["codigo_categoria"],
                                $data["codigo_tipo_producto"],
                                $ruta,
                                $data["codigo_producto"]
                            );
                            if($ok){
                                \Utilities\Site::redirectToWithMsg(
                                    "index.php?page=mnt_productos",
                                    "Productto modificado Exitosamente"
                                );
                            }
                            }else{
                                \Utilities\Site::redirectToWithMsg(
                                    "index.php?page=mnt_productos",
                                    "Problema al guardar la imagen"
                                );
                            }

                            break;
                case 'DEL':
                    $ok=\Dao\productos::DeleteProduct(
                        $data["codigo_producto"]
                      );
                      if($ok){
                        \Utilities\Site::redirectToWithMsg(
                          "index.php?page=mnt_productos",
                          "Hero Panel agregado Exitosamente"
                      );
                    } 
                            break;
           }



        }else{
            $data["mode"]=$_GET["mode"];
            $data["codigo_producto"]=isset($_GET["id"])?$_GET["id"]:0;
            $this->verificarToken();

        }
        //POSTBACK

        //visualizar datos
        if($data["mode"]=="INS"){
            $data["ModalTitle"]="Agregando nuevo producto";

            $data["categorias"]=\Dao\Categorias::getAllCategorias();
            $data["tipo_p"]=\Dao\productos::getTipo();
        
        }else{
            $productoId=\Dao\productos::getProductId($data["codigo_producto"]);
            if(!$productoId){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_productos",
                    "No existe el registro"
                  );}
                  \Utilities\ArrUtils::mergeFullArrayTo($productoId, $data);
                  if($data["mode"]=="DEL" || $data["Mode"]="DSP"){
                      $data["readonly"]="readonly";
                      $data["showCommitBtn"]=$data["mode"]=="DEL";
                  }
        }
        \Views\Renderer::render("mnt\producto",$data);

    }//void

    private function verificarToken(){
        if(!isset($_SESSION["productos_xss_token"])){
            \Utilities\Site::redirectToWithMsg(
              "index.php?page=mnt_productos",
              "Algo sucedio mal intente de nuevo"
            );
          }else{
              $time=time();
              if($time-$_SESSION["productos_xss_token_tts"]>86400){
                \Utilities\Site::redirectToWithMsg(
                  "index.php?page=mnt_productos",
                  "Algo Sucedio mal intente de nuevo"
                );
              }
    
          }
    }
}//class
?>