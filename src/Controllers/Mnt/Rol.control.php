<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

    class Rol extends PublicController{
        public function run():void{
            $data=array();
            $ModalTitle=array(
                "INS"=>"Nuevo Hero Panel",
                "UPD"=>"Actualiza %s - %s",
                "DSP"=>"Detalle de %s - %s",
                "DEL"=>"Eliminaod %s - %s"
            );
            $data["ModalTitle"]="";
            $data["codigo_rol"]=0;
            $data["descripcion_rol"]="";
            $data["estado"]="";
            $data["showCommitBtn"]=true;
            $data["readonly"]="";

            if($this->isPostBack()){
                $data["mode"]=$_POST["mode"];
                $data["codigo_rol"]=$_POST["codigo_rol"];
                $data["token"]=$_POST["token"];
                //$this->verificarToken();
                if($data["token"] != $_SESSION["roles_xss_token"]){
                    $time=time();
                    $token=md5("roles".$time);
                    $_SESSION["roles_xss_token"]=$token; 
                    $_SESSION["roles_xss_token_tts"]=$time;
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_roles",
                        "Algo sucedio mal intente de nuevo :("
                    );
                }
                if($data["mode"]!='DEL'){
                    $data["descripcion_rol"]=$_POST["descripcion_rol"];
                    $data["estado"]=$_POST["descripcion_rol"];
                }
                switch($data["mode"]){
                    case 'INS': 
                                $ok=\Dao\Security\Security::addNewRol(
                                    $data["codigo_rol"],
                                    $data["descripcion_rol"],
                                    $data["estado"]
                                );
                                if($ok){
                                    \Utilities\Site::redirectToWithMsg(
                                        "index.php?page=mnt_roles",
                                        "Rol agregado Exitosamente"
                                    );
                                }
                                break; 
                    case 'UPD': 
                                $ok=\Dao\Security\Security::modificarRol(
                                    $data["descripcion_rol"],
                                    $data["estado"],
                                    $data["codigo_rol"]);                                
                                if($ok){
                                    \Utilities\Site::redirectToWithMsg(
                                        "index.php?page=mnt_roles",
                                        "Rol modificado Exitosamente"
                                    );
                                }
                                break; 
                    case 'DEL': 
                        $ok=\Dao\Security\Security::DeleteRol(
                            $data["codigo_rol"]
                        );
                        if($ok){
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_roles",
                                "Elimnado rol Exitosamente"
                            );
                        }
                                break;
                }
            }else{
                $data["mode"]=$_GET["mode"];
                $data["codigo_rol"]=isset($_GET["id"])?$_GET["id"]:0;
                //$this->verificarToken();   

            }
            //Fin IsPostBack

            if($data["mode"]=='INS'){
                $data["ModalTitle"]="Agregando nuevo rol";

            }else{
                $rolId=\Dao\Security\Security::getRolById($data["codigo_rol"]);
                if(!$rolId){
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_roles",
                        "No existe el registro"
                      );
                    
                }
                \Utilities\ArrUtils::mergeFullArrayTo($rolId, $data);
                if($data["mode"]=='DEL' || $data["mode"]=='DSP'){
                    $data["readonly"]="readonly";
                    $data["showCommitBtn"]= $data["mode"]=="DEL";
                }

            }
            \Views\Renderer::render("mnt\rol", $data);
        }
        private function verificarToken(){
            if(!isset($_SESSION["roles_xss_token"])){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_roles",
                    "Algo sucedio mal intente de nuevo"
                  );
            }else{
                $time=time();
                if($time-$_SESSION["roles_xss_token_tts"]>86400){
                    \Utilities\Site::redirectToWithMsg(
                      "index.php?page=mnt_roles",
                      "Algo Sucedio mal intente de nuevo"
                    );
                  }
            }
        }
    }
?>