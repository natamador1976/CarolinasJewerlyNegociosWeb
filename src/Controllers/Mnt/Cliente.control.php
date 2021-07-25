<?php
namespace Controllers\Mnt;

class Cliente extends \Controllers\PublicController{
    public function run():void {
        $Data = array();
        $ModalTitle=array(
            "INS"=>"Nuevo Cliente",
            "UPD"=>"Actualiza %s - %s",
            "DSP"=>"Detalle de %s - %s",
            "DEL"=>"Eliminaod %s - %s"
        );

        $Data["ModalTitle"]="";
        $Data["codigo_cliente"]=0;
        $Data["nombre_ciente"]="";
        $Data["direccion"]="";
        $Data["telefono"]="" ;
        $Data["genero"]="";
        $Data["correo_electronico"]="cliente@gmail.com" ;
        $Data["codigo_usuario"]="";
        $Data["readonly"]="";
        $Data["showCommitBtn"]=true;


        if ($this -> isPostBack()){
            $Data["mode"]=$_POST["mode"];
            $Data["codigo_cliente"]=$_POST["codigo_cliente"];
            $Data["token"]=$_POST["token"];
            $this->verificarToken();

            if($Data["token"] !=$_SESSION["clientes_xss_token"]){
                $time=time();
                $token=md5("clientes".$time);
                $_SESSION["clientes_xss_token"]=$token;
                $_SESSION["clientes_xss_token_tts"]=$time;
                
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_clientes",
                    "Algo sucedio mal intente de nuevo"
                );
            }

            if($Data["mode"] != "DEL"){
                $Data["codigo_cliente"]=$_POST["codigo_cliente"];
                $Data["nombre_ciente"]=$_POST["nombre_ciente"];
                $Data["direccion"]=$_POST["direccion"];
                $Data["telefono"]=$_POST["telefono"];
                $Data["genero"]=$_POST["genero"];
                $Data["correo_electronico"]=$_POST["correo_electronico"];
                $Data["codigo_usuario"]=$_POST["codigo_usuario"];
            }


            switch($Data["mode"]){
                case 'INS': 
                    $ok = \Dao\Clientes::addCliente(
                        $Data["nombre_ciente"],
                        $Data["direccion"],
                        $Data["telefono"],
                        $Data["genero"],
                        $Data["correo_electronico"],
                        $Data["codigo_usuario"]
                    );

                    if ($ok){
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_clientes",
                            "Registro guardado con exito!!"
                         );
                    }
                    break;

                case 'DEL':
                    $ok=\Dao\Clientes::DeleteCliente(
                        $Data["codigo_cliente"]
                    );
                    if($ok){
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_clientes",
                            "Producto eliminado con exito"
                        );
                    }
                    break;

                case 'UPD':
                        $ok=\Dao\Clientes::updateCliente(
                            $Data["nombre_ciente"],
                            $Data["direccion"],
                            $Data["telefono"],
                            $Data["genero"],
                            $Data["correo_electronico"],
                            $Data["codigo_usuario"],
                            $Data["codigo_cliente"]
                        );
                        if($ok){
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_clientes",
                                "Producto modificado con exito"
                            );
                        }
                        break;
            } 
        } else{
            $Data["mode"]=$_GET["mode"];
            $Data["codigo_cliente"]=isset($_GET["id"]) ? $_GET["id"]:0;
            $this->verificarToken();
        }
        
        if ($Data["mode"] == "INS"){
            $Data["ModalTitle"] = "Agregando nuevo cliente";
        } else {
            $clienteid = \Dao\Clientes::getClientesById($Data["codigo_cliente"]);

            if (!$clienteid){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_clientes",
                    "No existe el registro"
                );
            }

            \Utilities\ArrUtils::mergeFullArrayTo($clienteid, $Data);
            $Data["ModalTitle"] = sprintf(
                $ModalTitle[$Data["mode"]],
                $Data["codigo_cliente"],
                $Data["nombre_ciente"]
            );

            if($Data["mode"]=="DEL" ||  $Data["mode"]=="DSP"){
                $Data["readonly"]="readonly";
                $Data["showCommitBtn"]= $Data["mode"]=="DEL";
              
            } 
        }
        \Views\Renderer::render("mnt\Cliente", $Data);
    }

    private  function verificarToken(){
        if(!isset($_SESSION["clientes_xss_token"])){
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_clientes",
                "Algo sucedio mal intente de nuevo"
            );
        }else{
            $time=time();
            if($time-$_SESSION["clientes_xss_token_tts"]>86400){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_clientes",
                    "Algo Sucedio mal intente de nuevo"
                  );
            }
        }
    } 
}
?>