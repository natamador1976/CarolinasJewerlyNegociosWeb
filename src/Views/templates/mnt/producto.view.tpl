<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>
<section class="container-md d-flex justify-content-center"  style="width:100vh;">
    <form action="index.php?page=mnt_producto" method="POST" class="border  w-75 p-3" enctype="multipart/form-data">
        <div class="m-5">
            <label for="codigo_producto" class="form-label">Código</label>
            <input class="form-control" type="text" name="codigo_producto" id="codigo_producto" value="{{codigo_producto}}"readonly disabled />
            <input type="hidden" name="mode" value="{{mode}}"/>
            <input type="hidden" name="codigo_producto" value="{{codigo_producto}}"/>
            <input type="hidden" name="token"id="token" value="{{productos_xss_token}}">
        </div>
        <div class="m-5">
            <label for="nombre_producto" class="form-label">Nombre del Producto</label>
             <input class="form-control" type="text" name="nombre_producto" id="nombre_producto" value="{{nombre_producto}}" {{readonly}} />
        </div>
        <div class="m-5">
            <label for="descripcion_producto" class="form-label">Descripción del Producto</label>
            <input class="form-control" type="text" name="descripcion_producto" id="descripcion_producto" value="{{descripcion_producto}}" {{readonly}} />
        </div>
        <div class="m-5">
            <label for="precio" class="form-label">Precio</label>
            <input class="form-control" type="text" name="precio" id="precio" value="{{precio}}" />
        </div>
        <div class="m-5">
            <label for="cantidad_stock" class="form-label">Stock</label>
            <input class="form-control" type="text" name="cantidad_stock" id="cantidad_stock" value="{{cantidad_stock}}" />
        </div>

        <div class="m-5">
            <label for="codigo_tipo_producto" class="form-label">Tipo de Producto</label>
            <select name="codigo_tipo_producto" id="codigo_tipo_producto" class="form-select">
               {{foreach tipo_p}}
               <option value="{{codigo_tipo_producto}}">{{nombre_tipo_producto}}</option>
               {{endfor tipo_p}}
           </select>
        </div>
        <div class="m-5">
            <label for="codigo_categoria" class="form-label">Categoría</label>
           <select name="codigo_categoria" id="codigo_categoria" class="form-select">
               {{foreach categorias}}
               <option value="{{codigo_categoria}}">{{nombre_categoria}}</option>
               {{endfor categorias}}
           </select>
        </div>
        

        <div class="m-5">
             <label for="uri_img" class="form-label">Imagen</label>
             <input type="file" name="uri_img" id="uri_img" value="{{uri_img}}" />

        </div>
        <div class="m-5" >
          {{if showCommitBtn}}
            <button class="btn btn-primary" style="background-color: #F8485E; border: none; " type="submit" name="btnConfirmar">Confirmar</button>
          &nbsp;
          {{endif showCommitBtn}}
            <button class="btn btn-danger"type="button" id="btnCancelar">
              {{if showCommitBtn}}
              Cancelar
              {{endif showCommitBtn}}
              {{ifnot showCommitBtn}}
              Regresar
              {{endifnot showCommitBtn}}
          </button>
        </div>
       
    </form>
</section>