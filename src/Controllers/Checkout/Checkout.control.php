<?php

namespace Controllers\Checkout;

use Controllers\PublicController;

class Checkout extends PublicController{
    public function run():void
    {
        $viewData = array();
        $tmp=\Dao\carrito::CarritoPaypal(); 
        $viewData["producto_carrito"]=array();
        foreach($tmp as $items){
            $viewData["producto_carrito"][]=$items;
        }
        if ($this->isPostBack()) {
            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "test".(time() - 10000000),
                "http://localhost/mvco/index.php?page=checkout_error",
                "http://localhost/mvco/index.php?page=checkout_accept"
            );


            //for ($i=0; $i< count($viewData); $i++){
                //$PayPalOrder->addItem($viewData[$i]["nombre_producto"],$viewData[$i]["descripcion_producto"] , $viewData[$i]["codigo_producto"], $viewData[$i]["precio"], 15, $viewData[$i]["cantidad"], $viewData[$i]["nombre_categoria"]);
           // }

            $PayPalOrder->addItem("Test", "TestItem1", "PRD1", 100, 15, 1, "DIGITAL_GOODS");
            $PayPalOrder->addItem("Test 2", "TestItem2", "PRD2", 50, 7.5, 2, "DIGITAL_GOODS");
            $response = $PayPalOrder->createOrder();
            $_SESSION["orderid"] = $response[1]->result->id;
            \Utilities\Site::redirectTo($response[0]->href);
            die();
        }

        \Views\Renderer::render("paypal/checkout", $viewData);
    }
}
?>
