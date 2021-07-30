<h1 > <span><i class="fas fa-shopping-cart"></i> </span> Carrito de Compras</h1>

<section class="d-flex flex-row m-5 flex-wrap justify-content-around ">
     
    <div>
         <table class="table table-light">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Producto</th>
                     <th>Código</th>
                     <th>Nombre</th>
                     <th>Precio</th>
                     <th>Cantidad</th>
                     <th></th>

                 </tr>
             </thead>
             <tbody>
                 {{foreach cart}}
                 <tr>
                     <td>{{row}}</td>
                     <td><img src="{{uri_img}}" alt="{{nombre_producto}} " style="width: 100px; height:100px;"/></td>
                     <td>{{codigo_producto_c}}</td>
                     <td>{{nombre_producto}}</td>
                     <td>{{precio}}</td>
                     <td>{{cantidad}}</td>
                     <td>
                        <a href=""><i class="far fa-trash-alt m-2" style="color:#F8485E; font-size:24px;"></i></a>
                     </td>
                 </tr>
                 {{endfor cart}}
             </tbody>
         </table>
           
     
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