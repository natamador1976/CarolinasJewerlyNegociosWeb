<?php

namespace Controllers\Mnt;

class Empleados extends \Controllers\PublicController {

    public function run():void
    {
        $viewData = array();
        $viewData["empleados"] = \Dao\EmpleadosPanel::listarEmpleados();
      
       
        \Views\Renderer::render("mnt/Empleados", $viewData);
      
    }
}

?>