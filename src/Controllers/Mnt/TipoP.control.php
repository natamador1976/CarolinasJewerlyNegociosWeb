<?php
    namespace Controllers\Mnt;


use Controllers\PublicController;

class TipoP extends PublicController{
    public function run():void{
        
        $data=array();
        $data["tipo_producto"]=array();
        $Tmp=\Dao\TipoP::getAllTipoP();

        foreach($Tmp as $item){
            $data["tipo_producto"][]=$item;
        }
       
        $time=time();
        $token=md5("tipo_p".$time);
        $_SESSION["tipo_p_xss_token"]=$token; 
        $_SESSION["tipo_p_xss_token_tts"]=$time;


        \Views\Renderer::render("mnt/TipoP", $data);

    }
}
?>