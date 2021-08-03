<section class="container-m row depth-1 px-4 py-4">
    <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
    <form action="index.php?page=mnt_rol" method="POST" class="col-12 col-m-8 offset-m-2">
        <div class="row my-2 align-center">
            <label for="" class="col-12 col-m-3">Código</label>
            <input type="text" name="codigo_rol" id="codigo_rol" class="col-12 col-m-9" value="{{codigo_rol}}"/>
        </div>
        <div class="row my-2 align-center">
            <label for="" class="col-12 col-m-3">Descripción</label>
            <input type="text" name="descripcion_rol" id="descripcion_rol" class="col-12 col-m-9" value="{{descripcion_rol}}"/>
        </div>
        <div class="row my-2 align-center">
            <label for="" class="col-12 col-m-3">Estado</label>
           <select name="" id=""></select>
        </div>
    </form>
</section>