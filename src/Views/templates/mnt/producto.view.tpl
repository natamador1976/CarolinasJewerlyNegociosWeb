<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
    <form action="index.php?page=mnt_producto" method="POST" class="col-12 col-m-8 offset-m-2" enctype="multipart/form-data">
        <div class="row my-2 align-center">
            <label for="codigo_producto" class="col-12 col-m-3">Código</label>
            <input type="text" name="codigo_producto" id="codigo_producto" value="{{codigo_producto}}"readonly disabled />
            <input type="hidden" name="mode" value="{{mode}}"/>
            <input type="hidden" name="codigo_producto" id="token " value="{{codigo_producto}}"/>
            <input type="hidden" name="token"id="token" value="{{productos_xss_token}}">
        </div>
        <div class="row my-2 align-center">
            <label for="nombre_producto" class="col-12 col-m-3">Nombre del Producto</label>
             <input class="col-12 col-m-9" type="text" name="nombre_producto" id="nombre_producto" value="{{nombre_producto}}" {{readonly}} />
        </div>
        <div class="row my-2 align-center">
            <label for="descripcion_producto" class="col-12 col-m-3">Descripción del Producto</label>
            <input class="col-12 col-m-9" type="text" name="descripcion_producto" id="descripcion_producto" value="{{descripcion_producto}}" {{readonly}} />
        </div>
        <div class="row my-2 align-center">
            <label for="precio" class="col-12 col-m-3">Precio</label>
            <input class="col-12 col-m-9" type="text" name="precio" id="precio" value="{{precio}}" />
        </div>
        <div class="row my-2 align-center">
            <label for="cantidad_stock" class="col-12 col-m-3">Stock</label>
            <input class="col-12 col-m-9" type="text" name="cantidad_stock" id="cantidad_stock" value="{{cantidad_stock}}" />
        </div>
        <div class="row my-2 align-center">
            <label for="codigo_categoria" class="col-12 col-m-3">Categoría</label>
           <select name="codigo_categoria" id="codigo_categoria" class="col-12 col-m-9">
               {{foreach categorias}}
               <option >Seleccione una Categoría</option>
               <option value="{{codigo_categoria}}">{{nombre_categoria}}</option>
               {{endfor categorias}}
           </select>
        </div>
        <div class="row my-2 align-center">
            <label for="codigo_tipo_producto" class="col-12 col-m-3">Tipo de Producto</label>
            <select name="codigo_tipo_producto" id="codigo_tipo_producto" class="col-12 col-m-9" >
               {{foreach tipo_p}}
               <option >Seleccione un tipo de producto</option>
               <option value="{{codigo_tipo_producto}}">{{nombre_tipo_producto}}</option>
               {{endfor tipo_p}}
           </select>
        </div>

        <div class="row my-2 align-center">
             <label for="uri_img" class="col-12 col-m-3">Imagen</label>
             <input type="file" name="uri_img" id="uri_img"/>

        </div>
        <div class="row my-4 align-center flex-end">
          {{if showCommitBtn}}
          <button class="primary col-12 col-m-2"type="submit" name="btnConfirmar">Confirmar</button>
          &nbsp;
          {{endif showCommitBtn}}
          <button class="col-12 col-m-2" type="button" id="btnCancelar">
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