<?php
    namespace Controllers\Mnt;

    class Clientes extends \Controllers\PublicController{
        public function run():void{
            $Data = array();
            $tmpClientes = \Dao\Clientes::getAllClientes();
            $Data["clientes"] = array();
            $counter = 0;

            foreach($tmpClientes as $clientes){
                $counter ++;
                $clientes["rownum"] = $counter;
                $clientes["nombre_ciente"] = str_replace(array("<",">"), array("&lt;","&gt"), $clientes["nombre_ciente"]);
                $Data["clientes"][]=$clientes;
            }
          
            $time = time();
            $token = md5("clientes". $time);
            $_SESSION["clientes_xss_token"] = $token;
            $_SESSION["clientes_xss_token_tts"] = $time;
            \Views\Renderer::render("mnt/Clientes", $Data);
        }
    }
?>