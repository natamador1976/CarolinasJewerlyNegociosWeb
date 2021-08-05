<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
  <form action="index.php?page=mnt_user" method="POST" class="col-12 col-m-8 offset-m-2">
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="prdcod">Código</label>
      <input class="col-12 col-m-9" readonly disabled type="text" name="codigo_usuario" id="codigo_usuario" placehoder="Código" value="{{codigo_usuario}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="codigo_usuario" value="{{codigo_usuario}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroname">Nombre</label>
      <input class="col-12 col-m-9" {{readonly}} type="text" name="nombre_usuario" id="nombre_usuario" placehoder="Panel" value="{{nombre_usuario}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="correo_electronico">Correo </label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="correo_electronico" id="correo_electronico" placehoder="" value="{{correo_electronico}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroimgurl">usuarioactcod </label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="usuarioactcod" id="usuarioactcod" placehoder="" value="{{usuarioactcod}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="heroimgurl">Clave </label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="password" id="password" placehoder="" value="{{password}}" />
    </div>
      <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="documento">Fecha creacion</label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="fecha_creacion" id="prdfecha_creacionImgPrm" placehoder="" value="{{fecha_creacion}}" />
    </div>
    
     <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="estado">Estado</label>
      <select name="estado" id="Estado" class="col-12 col-m-9" {{if readonly}} readonly disabled {{endif readonly}}>
        <option value="ACT" {{if estado}}selected{{endif estado}}>ACT</option>
        <option value="INA" {{if estado}}selected{{endif estado}}>INA</option>
      </select>
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="prdImgScd">password estado</label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="password_estado" id="password_estado" placehoder="" value="{{password_estado}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="prdImgScd">password_fexpirar</label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="password_fexpirar" id="password_fexpirar" placehoder="" value="{{password_fexpirar}}" />
    </div>





    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="tipo_usuario">Tipo usuario</label>
      <select name="tipo_usuario" id="tipo_usuario" class="col-12 col-m-9" {{if readonly}} readonly disabled {{endif readonly}}>
        <option value="ADM" {{if tipo_usuario}}selected{{endif tipo_usuario}}>ADMIN</option>
        <option value="EMP" {{if tipo_usuario}}selected{{endif tipo_usuario}}>EMP</option>
      </select>
    </div>

  
   
   <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="password_lastchange">Fecha modificacion</label>
      <input class="col-12 col-m-9" readonly disabled type="text" name="password_lastchange" id="password_lastchange" placehoder="" value="{{password_lastchange}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="password_lastchange" value="{{password_lastchange}}" />
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
      window.location.assign("index.php?page=mnt_users");
    });
  });
</script>