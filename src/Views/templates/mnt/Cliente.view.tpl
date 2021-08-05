  <section class="container-m row depth-1 px-4 py-4">
<h1>{{ModalTitle}}</h1>
</section>
<section class="container-md d-flex justify-content-center"  style="width:100vh;">
<form action="index.php?page=mnt_cliente" method="POST" class="border  w-75 p-3">
  <div class="m-5">
    <label class="form-label" for="codigo_cliente">Código</label>
    <input class="form-control" readonly disabled type="text" name="codigo_cliente" id="codigo_cliente" placehoder="Código" value="{{codigo_cliente}}" />
    <input type="hidden" name="mode" value="{{mode}}" />
    <input type="hidden" name="codigo_cliente" value="{{codigo_cliente}}" />
    <input type="hidden" name="token" value="{{clientes_xss_token}}" />
  </div>
  <div class="m-5">
    <label class="form-label" for="nombre_ciente">Nombre</label>
    <input class="form-control" {{readonly}} type="text" name="nombre_ciente" id="nombre_ciente" placehoder="Nombre" value="{{nombre_ciente}}" />
  </div>
  <div class="m-5">
    <label class="form-label" for="direccion">Dirección</label>
    <input class="form-control" {{readonly}} type="" name="direccion" id="direccion" placehoder="Direccion" value="{{direccion}}" />
  </div>
  <div class="m-5">
    <label class="form-label" for="telefono">Telefono</label>
    <input class="form-control" {{readonly}} type="" name="telefono" id="telefono" placehoder="telefono" value="{{telefono}}" />
  </div>
  <div class="m-5">
    <label class="form-label" for="genero">Género</label>
    <input class="form-control" {{readonly}} type="" name="genero" id="genero" placehoder="genero" value="{{genero}}" />
  </div>
  <div class="m-5">
  <label class="form-label" for="correo_electronico">Correo</label>
  <input class="form-control" {{readonly}} type="" name="correo_electronico" id="correo_electronico" placehoder="correo_electronico" value="{{correo_electronico}}" />
</div>
<div class="m-5">
<label class="form-label" for="codigo_usuario">codigo usuario</label>
<input class="form-control" {{readonly}} type="" name="codigo_usuario" id="codigo_usuario" placehoder="codigo_usuario" value="{{codigo_usuario}}" />
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