<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

class TipoProducto extends PublicController{
    public function run():void{
        $data=array();
        $ModalTitle=array(
            "INS"=>"Nuevo Hero Panel",
            "UPD"=>"Actualiza %s - %s",
            "DSP"=>"Detalle de %s - %s",
            "DEL"=>"Eliminaod %s - %s"
        );
        $data["codigo_tipo_producto"]=0;
        $data["nombre_tipo_producto"]="";
        $data["descripcion_tipo_producto"]="";
        $data["showCommitBtn"]=true;
        $data["readonly"]="";

        if($this->isPostBack()){
            $data["mode"]=$_POST["mode"];
            $data["codigo_tipo_producto"]=$_POST["codigo_tipo_producto"];
            $data["token"]=$_POST["token"];

            $this->verificarToken();
            if($data["token"] != $_SESSION["tipo_p_xss_token"]){
                $time=time();
                $token=md5("tipo_p".$time);
                $_SESSION["tipo_p_xss_token"]=$token;
                $_SESSION["tipo_p_xss_token_tts"]=$time;
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_TipoP",
                    "Algo sucedio mal intente de nuevo :("
                );}

            if($data["mode"]!='DEL'){
                $data["codigo_tipo_producto"]=$_POST["codigo_tipo_producto"];
                $data["nombre_tipo_producto"]=$_POST["nombre_tipo_producto"];
                $data["descripcion_tipo_producto"]=$_POST["descripcion_tipo_producto"];
            }

            switch($data["mode"]){
                case 'INS':
                    $ok=\Dao\TipoP::AddTipoP(
                        $data["nombre_tipo_producto"],
                        $data["descripcion_tipo_producto"]
                    );

                    if($ok){
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_TipoP",
                            "El Tipo de Producto se agrego exitosamente!"
                        );
                    }
                        break;
                case 'UPD':
                    $ok=\Dao\TipoP::UpdateTipoP(
                        $data["nombre_tipo_producto"],
                        $data["descripcion_tipo_producto"],
                        $data["codigo_tipo_producto"]
                    );
                    if($ok){
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_TipoP",
                            "El Tipo de Producto se modifico exitosamente!"
                        );
                    }
                        break;
                case 'DEL':
                    $ok=\Dao\TipoP::DeleteTipoP(
                        $data["codigo_tipo_producto"]
                    );
                    if($ok){
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_TipoP",
                            "El Tipo de Producto se elimino exitosamente!"
                        );
                    }
                        break;
            }
        }else{
            $data["mode"]=$_GET["mode"];
            $data["codigo_tipo_producto"]=isset($_GET["id"])?$_GET["id"]:0;
            $this->verificarToken();
        }


        if($data["mode"]=='INS'){
            $data["ModalTitle"]="Agregando nuevo Tipo de producto";
            
        }else{
            $TipoPId=\Dao\TipoP::getTipoPbyId(
                $data["codigo_tipo_producto"]
            );
            if(!$TipoPId){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_TipoP",
                    "No existe el registro"
                  );
                }
            \Utilities\ArrUtils::mergeFullArrayTo($TipoPId, $data);
            if($data["mode"]=='DEL' || $data["mode"]=='DSP'){
                $data["readonly"]="readonly";
                $data["showCommitBtn"]=$data["mode"]=='DEL';
            }
        }
        \Views\Renderer::render("mnt\TipoProducto", $data);
    }

    private function verificarToken(){
        if(!isset($_SESSION["tipo_p_xss_token"])){
            \Utilities\Site::redirectToWithMsg(
              "index.php?page=mnt_TipoP",
              "Algo sucedio mal intente de nuevo"
            );
          }else{
              $time=time();
              if($time-$_SESSION["tipo_p_xss_token_tts"]>86400){
                \Utilities\Site::redirectToWithMsg(
                  "index.php?page=mnt_TipoP",
                  "Algo Sucedio mal intente de nuevo"
                );
              }
    
          }
    }
}
?>