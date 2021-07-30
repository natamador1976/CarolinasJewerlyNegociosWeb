<h1>Productos</h1>

 
<div class="row" >
    {{foreach productos}}
       <form action="index.php?page=mnt_productoclient" method="POST" class="d-flex row" >
          
    <div class="col-sm-3">
    <div class="card m-3" style="width: 300px; height:500px; img{width: 300px; height:200px}">
        <img class="card-img-top img-fluid" name="uri_img" value="" src="{{uri_img}}" alt="Card image cap">
        <div class="card-body d-flex flex-column justify-content-center">
            <h4 class="card-title text-center" name="nombre_producto" value="">{{nombre_producto}}</h4>
            <input type="Number" name="cantidad" value=""/>
            <p class="card-text text-center" name="descripcion_producto" value="" >{{descripcion_producto}}</p>
        </div>
        <div class="card-link d-flex flex-column flex-lg-row d-lg-flex justify-content-center">
            <button name="btnComprar" id="btnComprar" style="background-color: #F8485E; border:none;" class="btn btn-primary m-2"   type="submit" role="button">Comprar</button>
            <input type="hidden" name="codigo_producto" value="{{codigo_producto}}">
            <input type="hidden" name="nombre_producto" id="nombre_producto" value="{{nombre_producto}}">
            <input type="hidden" name="descripcion_producto" id="descripcion_producto" value="{{descripcion_producto}}">
            <input type="hidden" name="precio" id="precio" value="{{precio}}">
            <a name="btnPrecio" id="btnPrecio"   class="btn btn-primary m-2"  href="#" role="button" style="background-color: #000; border:none; color:#fff;" name="precio"><i class="fas fa-money-check-alt" ></i> {{precio}}</a>
            <a name="btnWidsh" id="btnWish"  style="background-color: #F8485E; border:none;"class="btn btn-primary m-2"  role="button"><i class="far fa-heart"></i></a>
        </div>
    </div>
    </div>
{{endfor productos}}
</form>

</div>


