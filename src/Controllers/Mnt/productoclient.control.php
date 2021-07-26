<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

class productoclient extends PublicController{
    public function run():void{
        \Utilities\Site::addLink("public/css/cards.css");
        $data=array();
        $data["productos"]=array();
        $tmp=\Dao\productos::getAllProductos();
        foreach($tmp as $tmpitems){
            $data["productos"][]=$tmpitems;
        }

        $time=time();
        $token=md5("productos",$time);
        $_SESSION["productos_xss_token"]=$token;
        $_SESSION["productos_xss_token_tts"]=$time; 

        \Views\Renderer::render("mnt/productoclient",$data);

        
    }
}
?>