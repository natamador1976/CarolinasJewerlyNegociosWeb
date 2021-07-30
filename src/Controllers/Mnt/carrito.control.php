<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

use Views\Renderer;

class carrito extends PublicController{
    public function run():void{
            $data=array();
            $data["cart"]=array();
            $tmp=\Dao\carrito::getAllShopChart();

            foreach($tmp as $item){
                $data["cart"][]=$item;
            }
        

        \Views\Renderer::render("mnt\carrito", $data);
        
    }
}
?>