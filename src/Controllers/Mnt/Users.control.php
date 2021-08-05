<?php

namespace Controllers\Mnt;

class Users extends \Controllers\PublicController {

    public function run():void
    {
        $viewData = array();
        $viewData["usuarios"] = \Dao\UsuariosPanel::listarUsarios();
      
       
        \Views\Renderer::render("mnt/usuarios", $viewData);
    }
}

?>