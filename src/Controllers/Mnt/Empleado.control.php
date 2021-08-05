<?php

namespace Controllers\Mnt;

use Utilities\ArrUtils;

class Empleado extends \Controllers\PublicController
{
    public function run():void
    {
        $viewData = array();
        $ModalTitles = array(
            "INS" => "Nuevo Empleado",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminado %s - %s"
        );

        $viewData["ModalTitle"] = "";
        $viewData["codigo_empleado"] ="" ;
        $viewData["num_identidad"] = "";
        $viewData["nombre_empleado"] = "";
        $viewData["fecha_nacimiento"] = "";
        $viewData["genero"] = "";
        $viewData["fecha_contrato"] = "";
        $viewData["foto_empleado"] = "";
        $viewData["puesto"] = "";
        $viewData["estado"] = "";
        $viewData["cod_usuario"] = "";
        $viewData["showCommitBtn"] = true;

        if (isset($_POST["btnConfirmar"])){
        // if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["codigo_empleado"] =$_POST["codigo_empleado"]; 
            $viewData["num_identidad"] = $_POST["num_identidad"];
            $viewData["nombre_empleado"] = $_POST["nombre_empleado"];
            $viewData["fecha_nacimiento"] = $_POST["fecha_nacimiento"];
            $viewData["genero"] = $_POST["genero"];;
            $viewData["fecha_contrato"] = $_POST["fecha_contrato"];
            $viewData["foto_empleado"] = $_POST["foto_empleado"];;
            $viewData["puesto"] = $_POST["puesto"];
            $viewData["estado"] = $_POST["estado"];
            $viewData["cod_usuario"] = $_POST["cod_usuario"];

            switch($viewData["mode"]) {
            case "INS":
                $ok = \Dao\EmpleadosPanel::agregarEmpleado(
                    $viewData["num_identidad"],
                    $viewData["nombre_empleado"],
                    $viewData["fecha_nacimiento"],
                    $viewData["genero"],
                    $viewData["foto_empleado"],
                    $viewData["puesto"],
                    $viewData["estado"],
                    $viewData["cod_usuario"]
     
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_Empleados",
                        "Empleado agregado Exitosamente"
                    );
                }
                break;
            case "UPD":
                $ok = \Dao\EmpleadosPanel::editarEmpleado(
                    $viewData["num_identidad"],
                    $viewData["nombre_empleado"],
                    $viewData["fecha_nacimiento"],
                    $viewData["genero"],
                    $viewData["fecha_contrato"],
                    $viewData["foto_empleado"],
                    $viewData["puesto"],
                    $viewData["estado"],
                    $viewData["cod_usuario"],
                    $viewData["codigo_empleado"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_Empleados",
                        "Empleado actualizado Exitosamente"
                    );
                }
                break;
            case "DEL":
                $ok = \Dao\EmpleadosPanel ::eliminarEmpleado(
                    $viewData["codigo_empleado"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_Empleados",
                        "Empleado eliminado Exitosamente"
                    );
                }
                break;
            }


        } else {
            $viewData["mode"] = $_GET["mode"];
            $viewData["codigo_empleado"] = isset($_GET["id"])? $_GET["id"] : 0;
            //$this->verificarToken();
            //$token = md5("heroes" . time());
            //$_SESSION["heroes_xss_token"] = $token;
        }

        //Visualizar los Datos
        if ($viewData["mode"] == "INS") {
            $viewData["ModalTitle"] = "Agregando nuevo Empleado";
         
        } else {
            //aqui obtenemos el registro por id.
            $Empleado = \Dao\EmpleadosPanel::buscarEmpleado($viewData["codigo_empleado"]);
            /* $viewData["heroItemid"] = $heroItem["heroItemid"];
            $viewData["heroname"] = $heroItem["heroname"];
            $viewData["heroimgurl"] = $heroItem["heroimgurl"];
            $viewData["heroaction"] = $heroItem["heroaction"];
            $viewData["heroorder"] = $heroItem["heroorder"];
            $viewData["heroest"] = $heroItem["heroest"];
            */
            
            error_log(json_encode($Empleado));
            if (!$Empleado) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_Empleados",
                    "No existe el registro"
                );
            }
            // Mas rapido lazy developers
            \Utilities\ArrUtils::mergeFullArrayTo($Empleado, $viewData);
            $viewData["ModalTitle"] = sprintf(
                $ModalTitles[$viewData["mode"]],
                $viewData["codigo_empleado"],
                $viewData["nombre_empleado"]
                
            );
            

            if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP") {
                $viewData["readonly"] = "readonly";
                $viewData["showCommitBtn"]  = $viewData["mode"] == "DEL";
            }

        }

        \Views\Renderer::render("mnt/Empleado", $viewData);
    }

    private function verificarToken(){
        if (!isset($_SESSION["heroes_xss_token"])) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_Empleados",
                "Algo sucedio mal intente de nuevo"
            );
        } else {
            $time = time();
            if ($time - $_SESSION["heroes_xss_token_tts"] > 86400) {
                //24 * 60 * 60  horas * minutos * segundo
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_Empleados",
                    "Algo sucedio mal intente de nuevo"
                );
            }
        }
    }

}