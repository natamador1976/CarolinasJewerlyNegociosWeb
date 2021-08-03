<h1 > <span><i class="fas fa-shopping-cart"></i> </span> Carrito de Compras</h1>

<section class="d-flex flex-row m-5 flex-wrap justify-content-around " style="height: 100vh;">
    
    <div class="">
         <table class="table table-light" style="width: 1000px; ">
             <thead>
                 <tr>
                     
                     <th>Producto</th>
                     <th>Código</th>
                     <th>Nombre</th>
                     <th>Precio</th>
                     <th>Cantidad</th>
                     <th>Subtotal</th>
                     <th></th>

                 </tr>
             </thead>
             <tbody>
                 {{foreach cart}}
                 <tr>
                     
                     <td><img src="{{uri_img}}" alt="{{nombre_producto}} " style="width: 100px; height:100px;"/></td>
                     <td>{{codigo_producto_c}}</td>
                     <td>{{nombre_producto}}</td>
                     <td>{{precio}}</td>
                     <td>{{cantidad}}</td>
                     <td>{{subtotal}}</td>
                    
                     <td>
                        <form action="index.php?page=mnt_carrito" method="POST">
                            <input type="hidden" value="{{codigo_producto_c}}" name="codigo_producto_c"/>
                        <button name="BtnDelete" onclick="" id="BtnDelete" type="submit" class="btn btn-light shadow-md"><i class="far fa-trash-alt m-2" style="color:#F8485E; font-size:24px;"></i></button>
                       </form>
                     </td>
                     
                 </tr>
                 {{endfor cart}}
             </tbody>
         </table>
           
     
    </div>
   
 
    <!--Pago-->
    <div class=" ">
        
        <div class="card" style="width: 400px;">
            <h2 class="text-center m-3"> Pago</h2>
            <form action="" method="POST">
               <div class="m-3">
                    <label for="txtSubtotal">Subtotal</label>
                    <input class="m-2 " type="text" value="{{suma}}" readonly disabled/>
               </div>
               <div class="m-3">
                    <label for="txtImpuesto">Impuesto</label>
                    <input class="m-2 " type="text" value="{{isv}}" readonly disabled/>
               </div>
               <div class="m-3">
                    <label for="txtTotal">Total</label>
                    <input class="m-2 " type="text" value="{{total}}" readonly disabled/>
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