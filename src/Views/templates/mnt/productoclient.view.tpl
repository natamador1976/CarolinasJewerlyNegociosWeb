<h1>Productos</h1>
<section>
    <form action="index.php?page=mnt_carrito" method="POST" >
<div class="row ">
    {{foreach productos}}

    <div class="col-sm-3">
    <div class="card m-4">
        <img class="card-img-top img-fluid" src="{{uri_img}}" alt="Card image cap">
        <div class="card-body d-flex flex-column justify-content-center">
            <h4 class="card-title text-center" >{{nombre_producto}}</h4>
            <input type="Number" value="{{cantidad}}">
            <p class="card-text text-center" >{{descripcion_producto}}</p>
        </div>
        <div class="card-link d-flex flex-column flex-lg-row d-lg-flex justify-content-center">
            <a name="btnComprar" id="btnComprar" style="background-color: #F8485E; border:none;" class="btn btn-primary m-2"  href="#" type="submit" role="button">Comprar</a>
            <input type="hidden" name="" value="{{codigo_producto}}">
            <a name="btnPrecio" id="btnPrecio" class="btn btn-primary m-2"  href="#" role="button" style="background-color: #000; border:none; color:#fff;"><i class="fas fa-money-check-alt" ></i> {{precio}}</a>
            <a name="btnPrecio" id="btnPrecio"  style="background-color: #F8485E; border:none;"class="btn btn-primary m-2" href="#" role="button"><i class="far fa-heart"></i></a>
        </div>
    </div>

</div>
{{endfor productos}}
</div>
</form>
</section>
