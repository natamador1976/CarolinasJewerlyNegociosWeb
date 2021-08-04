<?php
    namespace Controllers\Mnt;



class productos extends \Controllers\PrivateController{
    public function run():void{
        $data=array(); 
        $data["CanInsert"]=self::isFeatureAutorized("Controllers\Mnt\Productos\New");
        $data["CanUpdate"]=self::isFeatureAutorized("Controllers\Mnt\Productos\Upd");
        $data["CanDelete"]=self::isFeatureAutorized("Controllers\Mnt\Productos\Del");
        $data["CanView"]=self::isFeatureAutorized("Controllers\Mnt\Productos\View");
        $tmp=\Dao\productos::getProductos();
        $data["productos"]=array();
       
        foreach($tmp as $tmpitems){
            $data["productos"][]=$tmpitems;
        }

        $time=time();
        $token=md5("productos".$time);
        $_SESSION["productos_xss_token"]=$token;
        $_SESSION["productos_xss_token_tts"]=$time; 

        \Views\Renderer::render("mnt/productos",$data);
    }
}
?>