<h1 > <span><i class="fas fa-shopping-cart"></i> </span> Carrito de Compras</h1>

<section class="d-flex flex-row m-5 flex-wrap justify-content-around ">
     
    <div class="column col-sm-6 card">
         
            <div class="card d-flex m-2">
                 {{foreach cart}} 
                <img src="{{uri_img}}" alt="{{nombre_producto}}" class="card-img-top img-fluid">
                <div class="card-body d-flex justify-content-around">
                    <h4 class="card-title" name="nombre_producto" value="{{nombre_producto}}">{{nombre_producto}}</h4>
                    <p class="card-text" name="descripcion_producto" value="{{descripcion_producto}}">{{descripcion_producto}}</p>
                    <div>
                        <input type="text" name="cantidad" />
                        <a href=""><i class="far fa-edit m-2" style="color:#F8485E; font-size:24px;"></i></a>
                        <a href=""><i class="far fa-trash-alt m-2" style="color:#F8485E; font-size:24px;"></i></a>
                    </div>
                </div>
                     {{ endfor cart}}
            </div>
           
     
    </div>
 
    <!--Pago-->
    <div class="column col-sm-6 w-25">
        
        <div class="card">
            <h2 class="text-center m-3"> Pago</h2>
            <form action="" method="POST">
               <div class="m-3">
                    <label for="txtSubtotal">Subtotal</label>
                    <input class="m-2 " type="text" value="1234.90" readonly disabled/>
               </div>
               <div class="m-3">
                    <label for="txtImpuesto">Impuesto</label>
                    <input class="m-2 " type="text" value="1234.90" readonly disabled/>
               </div>
               <div class="m-3">
                    <label for="txtTotal">Total</label>
                    <input class="m-2 " type="text" value="1234.90" readonly disabled/>
               </div>
               <div >
                   <h3 class="text-center">Método de Pago</h3>
                   <div class="d-flex justify-content-center ">
                      <input   type="radio" name="btnPaypal" id="btnPaypal"/><span class=""><i class="fab fa-cc-paypal " style="font-size:50px;"></i></span>
                   </div>
               </div>
               <div class="d-flex justify-content-center ">
                   <button type="submit" name="btnPagar"  id="btnPagar" class="btn btn-outline-warning w-25 mt-3 mb-3">Pagar</button>
               </div>
            </form>
            
        </div>
       
    </div>

</section>