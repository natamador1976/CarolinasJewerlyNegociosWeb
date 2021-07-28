<?php
    namespace Controllers\Mnt;
    use Utilities\ArrUtils;
    class Categoria extends \Controllers\PrivateController{
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
            
        }
    }
?>