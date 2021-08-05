<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>

<section class="container-md d-flex justify-content-center"  style="width:100vh;">
    <form action="index.php?page=mnt_TipoProducto" method="POST" class="col-12 col-m-8 offset-m-2" >
    <div class="m-5">
        <label for="codigo_tipo_producto" class="form-label">Código</label>
        <input type="text" class="form-control" name="codigo_tipo_producto" value="{{codigo_tipo_producto}}" id="codigo_tipo_producto"/>
        <input type="hidden" name="mode" value="{{mode}}"/>
        <input type="hidden" name="codigo_tipo_producto" value="{{codigo_tipo_producto}}" />
        <input type="hidden" name="token" value="{{tipo_p_xss_token}}"/>
    </div>
    <div class="m-5">
        <label for="nombre_tipo_producto" class="form-label">Tipo de Producto</label>
        <input type="text" class="form-control" name="nombre_tipo_producto" value="{{nombre_tipo_producto}}" id="nombre_tipo_producto"/>
    </div>
    <div class="m-5">
        <label for="descripcion_tipo_produto" class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descripcion_tipo_producto" value="{{descripcion_tipo_producto}}" id="descripcion_tipo_producto"/>
    </div>

    <div class="m-5">
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

<script>
  document.addEventListener("DOMContentLoaded", ()=>{
    const btnCancelar = document.getElementById("btnCancelar");
    btnCancelar.addEventListener("click", (e)=>{
      e.preventDefault();
      e.stopPropagation();
      window.location.assign("index.php?page=mnt_TipoP");
    });
  });
</script>