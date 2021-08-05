<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-md d-flex justify-content-center"  style="width:100vh;">
  <form action="index.php?page=mnt_user" method="POST" class="border">
    <div class="m-5">
      <label class="form-label" for="prdcod">Código</label>
      <input class="form-control"  readonly disabled type="text" name="codigo_usuario" id="codigo_usuario" placehoder="Código" value="{{codigo_usuario}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="codigo_usuario" value="{{codigo_usuario}}" />
    </div>
    <div class="m-5">
      <label class="form-label" for="heroname">Nombre</label>
      <input class="form-control"  {{readonly}} type="text" name="nombre_usuario" id="nombre_usuario" placehoder="Panel" value="{{nombre_usuario}}" />
    </div>
    <div class="m-5">
      <label class="form-label" for="correo_electronico">Correo </label>
      <input class="form-control"  {{readonly}} type="" name="correo_electronico" id="correo_electronico" placehoder="" value="{{correo_electronico}}" />
    </div>
    <div class="m-5">
      <label class="form-label" for="heroimgurl">usuarioactcod </label>
      <input class="form-control"  {{readonly}} type="" name="usuarioactcod" id="usuarioactcod" placehoder="" value="{{usuarioactcod}}" />
    </div>
    <div class="m-5">
      <label class="form-label" for="heroimgurl">Clave </label>
      <input class="form-control"  {{readonly}} type="" name="password" id="password" placehoder="" value="{{password}}" />
    </div>
      <div class="m-5">
      <label class="form-label" for="documento">Fecha creacion</label>
      <input class="form-control"  {{readonly}} type="" name="fecha_creacion" id="prdfecha_creacionImgPrm" placehoder="" value="{{fecha_creacion}}" />
    </div>
    
     <div class="m-5">
      <label class="form-label" for="estado">Estado</label>
      <select name="estado" id="Estado" class="form-select" {{if readonly}} readonly disabled {{endif readonly}}>
        <option value="ACT" {{if estado}}selected{{endif estado}}>ACT</option>
        <option value="INA" {{if estado}}selected{{endif estado}}>INA</option>
      </select>
    </div>
    <div class="m-5">
      <label class="form-label" for="prdImgScd">password estado</label>
      <input class="form-control"  {{readonly}} type="" name="password_estado" id="password_estado" placehoder="" value="{{password_estado}}" />
    </div>
    <div class="m-5">
      <label class="form-label" for="prdImgScd">password_fexpirar</label>
      <input class="form-control"  {{readonly}} type="" name="password_fexpirar" id="password_fexpirar" placehoder="" value="{{password_fexpirar}}" />
    </div>

    <div class="m-5">
      <label class="form-label" for="tipo_usuario">Tipo usuario</label>
      <select name="tipo_usuario" id="tipo_usuario" class="form-select" {{if readonly}} readonly disabled {{endif readonly}}>
        <option value="ADM" {{if tipo_usuario}}selected{{endif tipo_usuario}}>ADMIN</option>
        <option value="EMP" {{if tipo_usuario}}selected{{endif tipo_usuario}}>EMP</option>
      </select>
    </div>
   
   <div class="m-5">
      <label class="form-label" for="password_lastchange">Fecha modificacion</label>
      <input class="form-control"  readonly disabled type="text" name="password_lastchange" id="password_lastchange" placehoder="" value="{{password_lastchange}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="password_lastchange" value="{{password_lastchange}}" />
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
      window.location.assign("index.php?page=mnt_users");
    });
  });
</script>