<?php
    namespace Controllers\Mnt;
    use Utilities\ArrUtils;
    class Categoria extends \Controllers\PublicController{
        public function run():void{
            $data = array();
            $ModalTitles = array(
                "INS" => "Nueva Categoria Panel",
                "UPD" => "Actualizando %s - %s",
                "DSP" => "Detalle de %s - %s",
                "DEL" => "Eliminando %s - %s"
            );

            $data["ModalTitle"] = "";
            $data["codigo_categoria"] = 0;
            $data["nombre_categoria"] = "";
            $data["descripcion_categoria"] = "";
            $data["readonly"] = "";
            $data["showCommitBtn"] = true;
            
            if($this->isPostBack()){
                $data["mode"] = $_POST["mode"];
                $data["codigo_categoria"] = $_POST["codigo_categoria"];
                $data["token"] = $_POST["token"];

                $this->verificarToken();
                if($data["token"]!=$_SESSION["categorias_xss_token"]){
                    $time = time();
                    $token = md5("categorias". $time);
                    $_SESSION["categorias_xss_token"] = $token;
                    $_SESSION["categorias_xss_token_tts"] = $time;
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_categorias",
                        "Algo sucedió mal intente de nuevo :("
                    );
                }

                if($data["mode"] != "DEL"){
                    $data["nombre_categoria"] = $_POST["nombre_categoria"];
                    $data["descripcion_categoria"] = $_POST["descripcion_categoria"];
                }

                switch($data["mode"]){
                    case "INS":
                        $ok = \Dao\Categorias::addCategoria(
                            $data["nombre_categoria"],
                            $data["descripcion_categoria"]
                        );
                        if($ok){
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_categorias",
                                "Categoria agregada exitosamente :)"
                            );
                        }
                        break;
                    case "UPD":
                        $ok = \Dao\Categorias::updateCategoria(
                            $data["nombre_categoria"],
                            $data["descripcion_categoria"],
                            $data["codigo_categoria"]
                        );
                        if($ok){
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_categorias",
                                "Categoria actualizada exitosamente :)"
                            );
                        }
                        break;
                    case "DEL" : 
                        $ok = \Dao\Categorias::deleteCategoria(
                            $data["codigo_categoria"]
                        );
                        if($ok){
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_categorias",
                                "Categoria eliminada exitosamente :)"
                            );
                        }
                        break;
                }
            }else{
                $data["mode"] = $_GET["mode"];
                $data["codigo_categoria"] = isset($_GET["id"])? $_GET["id"]: 0;
                $this->verificarToken();
            }

            if($data["mode"] == "INS"){
                $data["ModalTitle"] = "Agregando nueva Categoria";
            }else{
                $categoria = \Dao\Categorias::getCategoriaById($data["codigo_categoria"]);
                error_log(json_encode($categoria));
                if(!$categoria){
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_categorias",
                        "No existe el registro"
                    );
                }

                \Utilities\ArrUtils::mergeFullArrayTo($categoria, $data);
                $data["ModalTitle"] = sprintf(
                    $ModalTitles[$data["mode"]],
                    $data["codigo_categoria"],
                    $data["nombre_categoria"]
                );

                if($data["mode"] == "DEL" || $data["mode"] == "DSP"){
                    $data["readonly"] = "readonly";
                    $data["showCommitBtn"] = $data["mode"] == "DEL";
                }
            }

            \Views\Renderer::render("mnt/categoria" , $data);
        }

        private function verificarToken(){
            if(!isset($_SESSION["categorias_xss_token"])){
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_categorias",
                    "Algo sucedió mal intente de nuevo :("
                );
            }else{
                $time = time();
                if($time - $_SESSION["categorias_xss_token_tts"] > 86400){
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_categorias",
                        "Algo sucedió mal intente de nuevo"
                    );
                }
            }
        }
    }
?>