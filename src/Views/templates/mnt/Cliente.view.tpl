  
<section class="container-m row depth-1 px-4 py-4">
<h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
<form action="index.php?page=mnt_cliente" method="POST" class="col-12 col-m-8 offset-m-2">
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="codigo_cliente">Código</label>
    <input class="col-12 col-m-9" readonly disabled type="text" name="codigo_cliente" id="codigo_cliente" placehoder="Código" value="{{codigo_cliente}}" />
    <input type="hidden" name="mode" value="{{mode}}" />
    <input type="hidden" name="codigo_cliente" value="{{codigo_cliente}}" />
    <input type="hidden" name="token" value="{{clientes_xss_token}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="nombre_ciente">Nombre</label>
    <input class="col-12 col-m-9" {{readonly}} type="text" name="nombre_ciente" id="nombre_ciente" placehoder="Nombre" value="{{nombre_ciente}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="direccion">Dirección</label>
    <input class="col-12 col-m-9" {{readonly}} type="" name="direccion" id="direccion" placehoder="Direccion" value="{{direccion}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="telefono">Telefono</label>
    <input class="col-12 col-m-9" {{readonly}} type="" name="telefono" id="telefono" placehoder="telefono" value="{{telefono}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="genero">Género</label>
    <input class="col-12 col-m-9" {{readonly}} type="" name="genero" id="genero" placehoder="genero" value="{{genero}}" />
  </div>
  <div class="row my-2 align-center">
  <label class="col-12 col-m-3" for="correo_electronico">Correo</label>
  <input class="col-12 col-m-9" {{readonly}} type="" name="correo_electronico" id="correo_electronico" placehoder="correo_electronico" value="{{correo_electronico}}" />
</div>
<div class="row my-2 align-center">
<label class="col-12 col-m-3" for="codigo_usuario">codigo usuario</label>
<input class="col-12 col-m-9" {{readonly}} type="" name="codigo_usuario" id="codigo_usuario" placehoder="codigo_usuario" value="{{codigo_usuario}}" />
</div>
  <div class="row my-4 align-center flex-end">
    {{if showCommitBtn}}
    <button class="primary col-12 col-m-2" type="submit" name="btnConfirmar">Confirmar</button>
    &nbsp;
    {{endif showCommitBtn}}
    <button class="col-12 col-m-2"type="button" id="btnCancelar">
      {{if showCommitBtn}}
      Cancelar
      {{endif showCommitBtn}}
      {{ifnot showCommitBtn}}
      Regresar
      {{endifnot showCommitBtn}}
    </button>
  </div>
  </div>
</form>
</section>


<script>
document.addEventListener("DOMContentLoaded", ()=>{
  const btnCancelar = document.getElementById("btnCancelar");
  btnCancelar.addEventListener("click", (e)=>{
    e.preventDefault();
    e.stopPropagation();
    window.location.assign("index.php?page=mnt_clientes");
  });
});
</script>