  
<section class="container-m row depth-1 px-4 py-4">
<h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
<form action="index.php?page=mnt_suscripciones" method="POST" class="col-12 col-m-8 offset-m-2">
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="codigo_suscripcion">Código</label>
    <input class="col-12 col-m-9" readonly disabled type="text" name="codigo_suscripcion" id="codigo_suscripcion" placehoder="Código" value="{{codigo_suscripcion}}" />
    <input type="hidden" name="mode" value="{{mode}}" />
    <input type="hidden" name="codigo_suscripcion" value="{{codigo_suscripcion}}" />
    <input type="hidden" name="token" value="{{suscripciones_xss_token}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="codigo_usuario">Código Usuario</label>
    <input class="col-12 col-m-9" {{readonly}} type="text" name="codigo_usuario" id="codigo_usuario" placehoder="Panel" value="{{codigo_usuario}}" />
  </div>
  <div class="row my-2 align-center">
    <label class="col-12 col-m-3" for="estado">Estado</label>
    <select name="estado" id="estado" class="col-12 col-m-9" {{if readonly}} readonly disabled {{endif readonly}}>
      <option value="ACT" {{if estado_act}}selected{{endif estado_act}}>Mostrar</option>
      <option value="INA" {{if estado_ina}}selected{{endif estado_ina}}>Ocultar</option>
    </select>
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
    window.location.assign("index.php?page=mnt_suscripciones");
  });
});
</script>