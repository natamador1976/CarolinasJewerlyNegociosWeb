<h1>Productos</h1>
<div class=" cards">

    <div class="card">
        {{foreach productos}}
            <h1>{{nombre_producto}}</h1>
            <img src="{{uri_img}}" alt="Pelota">
            <p>{{descripcion_producto}}</p>
            <a href="">{{precio}}</a>
            <a href="">Comprar</a>
            {{endfor productos}}
    </div>


</div>