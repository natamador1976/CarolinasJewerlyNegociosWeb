<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-md d-flex justify-content-center"  style="width:100vh;">
  <form action="index.php?page=mnt_Empleado" method="POST" class="border ">
    <div class="m-5" >
      <label class="form-label" for="codigo_empleado">Código</label>
      <input class="col-12 col-m-9" readonly disabled type="text" name="codigo_empleado" id="codigo_empleado" placehoder="Código" value="{{codigo_empleado}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="codigo_empleado" value="{{codigo_empleado}}" />
    </div>
    <div class="m-5" >
      <label class="form-label" for="num_identidad">Identidad</label>
      <input class="form-control" {{readonly}} type="text" name="num_identidad" id="num_identidad" placehoder="Panel" value="{{num_identidad}}" />
    </div>
    <div class="m-5" >
      <label class="form-label" for="nombre_empleado">Nombre </label>
      <input class="form-control" {{readonly}} type="" name="nombre_empleado" id="nombre_empleado" placehoder="" value="{{nombre_empleado}}" />
    </div>
    <div class="m-5" >
      <label class="form-label" for="fecha_nacimiento">Nacimiento </label>
      <input class="form-control" {{readonly}} type="" name="fecha_nacimiento" id="fecha_nacimiento" placehoder="" value="{{fecha_nacimiento}}" />
    </div>
    <div class="m-5" >
      <label class="form-label" for="genero">Genero </label>
      <input class="form-control" {{readonly}} type="" name="genero" id="genero" placehoder="" value="{{genero}}" />
    </div>

    <div class="m-5" >
      <label class="form-label" for="fecha_contrato">Fecha contrato</label>
      <input class="form-control" {{readonly}} type="" name="fecha_contrato" id="fecha_contrato" placehoder="" value="{{fecha_contrato}}" />
    </div>
      <div class="m-5" >
      <label class="form-label" for="foto_empleado">Foto</label>
      <input class="form-control" {{readonly}} type="" name="foto_empleado" id="foto_empleado" placehoder="" value="{{foto_empleado}}" />
    </div>

     <div class="m-5" >
      <label class="form-label" for="puesto">Puesto</label>
      <input class="form-control" {{readonly}} type="" name="puesto" id="puesto" placehoder="" value="{{puesto}}" />
    </div>

     <div class="m-5" >
      <label class="form-label" for="estado">Estado</label>
      <input class="form-control" {{readonly}} type="" name="estado" id="estado" placehoder="" value="{{estado}}" />
    </div>
     <div class="m-5" >
      <label class="form-label" for="cod_usuario">cod_usuario</label>
      <input class="form-control" {{readonly}} type="" name="cod_usuario" id="cod_usuario" placehoder="" value="{{cod_usuario}}" />
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
      window.location.assign("index.php?page=mnt_empleados");
    });
  });
</script>