<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
    <form action="index.php?page=mnt_rol" method="POST" class="col-12 col-m-8 offset-m-2">
        <div class="row my-2 align-center">
            <label for="codigo_rol" class="col-12 col-m-3">Código</label>
            <input type="text" name="codigo_rol" id="codigo_rol" class="col-12 col-m-9" value="{{codigo_rol}}"/>
            <input type="hidden" name="mode" value="{{mode}}"/>
            <input type="hidden" name="codigo_rol" value="{{codigo_rol}}"/>
            <input type="hidden" name="token" value="{{roles_xss_token}}">
        </div>
        <div class="row my-2 align-center">
            <label for="descripcion_rol" class="col-12 col-m-3">Descripción</label>
            <input type="text"{{readonly}} name="descripcion_rol" id="descripcion_rol" class="col-12 col-m-9" value="{{descripcion_rol}}"/>
        </div>
        <div class="row my-2 align-center">
            <label for="estado" class="col-12 col-m-3">Estado</label>
           <select name="estado" id="estado" class="col-12 col-m-9" {{if readonly}} readonly disabled{{endif readonly}}>
               <option value="ACT" {{if estado_act}} selected {{endif estado_act}}>ACTIVO</option>
               <option value="INA" {{if estado_ina}} selected {{endif estado_ina}}>INACTIVO</option>
           </select>
        </div>
        <div class="row my-4 align-center flex-end">
            {{if showCommitBtn}}
            <button class="primary col-12 col-m-2" name="btnConfirmar" type="submit">Confirmar</button>
            &nbsp;
            {{endif showCommitBtn}}
            <button class="col-12 col-m-2" id="btnCancelar" type="submit">
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