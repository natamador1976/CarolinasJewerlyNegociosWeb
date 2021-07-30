<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>

<section class="container-m row depth-1 px-4 py-4">
    <form action="index.php?page=mnt_TipoProducto" method="POST" class="col-12 col-m-8 offset-m-2" >
    <div class="row my-2 align-center">
        <label for="codigo_tipo_producto" class="col-12 col-m-2">Código</label>
        <input type="text" class="col-12 col-m-9" name="codigo_tipo_producto" value="{{codigo_tipo_producto}}" id="codigo_tipo_producto"/>
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="codigo_tipo_producto" value="{{codigo_tipo_producto}}" />
        <input type="hidden" name="token" value="{{tipo_p_xss_token}}"/>
    </div>
    <div class="row my-2 align-center">
        <label for="nombre_tipo_producto" class="col-12 col-m-2">Tipo de Producto</label>
        <input type="text" class="col-12 col-m-9" name="nombre_tipo_producto" value="{{nombre_tipo_producto}}" id="nombre_tipo_producto"/>
    </div>
    <div class="row my-2 align-center">
        <label for="descripcion_tipo_produto" class="col-12 col-m-2">Descripción</label>
        <input type="text" class="col-12 col-m-9" name="descripcion_tipo_producto" value="{{descripcion_tipo_producto}}" id="descripcion_tipo_producto"/>
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