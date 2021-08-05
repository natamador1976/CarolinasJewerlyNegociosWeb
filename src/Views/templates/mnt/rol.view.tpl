<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>
<section class="container-md d-flex justify-content-center"  style="width:100vh;">
    <form action="index.php?page=mnt_rol" method="POST" class="border">
        <div class="m-5">
            <label for="codigo_rol" class="form-label">Código</label>
            <input class="form-control"  type="text" name="codigo_rol" id="codigo_rol" placehoder="Código" value="{{codigo_rol}}" />
            <input type="hidden" name="mode" value="{{mode}}"/>
            <input type="hidden" name="codigo_rol" value="{{codigo_rol}}"/>
            <input type="hidden" name="token" value="{{roles_xss_token}}">
        </div>
        <div class="m-5">
            <label for="descripcion_rol" class="form-label">Descripción</label>
            <input type="text"{{readonly}} name="descripcion_rol" id="descripcion_rol" class="form-control" value="{{descripcion_rol}}"/>
        </div>
        <div class="m-5">
            <label for="estado" class="form-label">Estado</label>
           <select name="estado" id="estado" class="form-select" {{if readonly}} readonly disabled{{endif readonly}}>
               <option value="ACT" {{if estado_act}} selected {{endif estado_act}}>ACTIVO</option>
               <option value="INA" {{if estado_ina}} selected {{endif estado_ina}}>INACTIVO</option>
           </select>
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
      window.location.assign("index.php?page=mnt_roles");
    });
  });
</script>