<?php
    namespace Controllers\Mnt;

use Controllers\PublicController;

class Roles extends PublicController {
    public function run():void{
        $data=array();
        $data["roles"]=array();
        $tmp=\Dao\Security\Security::getRoles();
        foreach($tmp as $items){
            $data["roles"][]=$items;
        }

        $time=time();
        $token="roles".$time;

        $_SESSION["roles_xss_token"]=$token; 
        $_SESSION["roles_xss_token_tts"]=$time;

        \Views\Renderer::render("mnt/roles", $data);
    }
}

?>