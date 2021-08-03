<h1>Listado de Tipos de Productos</h1>
<section class="container-md mt-4" style="height: 100vh;">
<table class="table table-info table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th class="hidden-s">Tipo de Producto</th>
            <th class="hidden-s">Descripción</th>
             <th><a href="index.php?page=mnt_TipoProducto&mode=INS" class="button"><i class="fas fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        {{foreach tipo_producto}}
        <tr>
            <td>{{codigo_tipo_producto}}</td>
            <td class="">{{nombre_tipo_producto}}</td>
            <td class="">{{descripcion_tipo_producto}}</td>
            <td class="center">
                <a href="index.php?page=mnt_TipoProducto&mode=UPD&id={{codigo_tipo_producto}}"><i class="far fa-edit"></i></a>
                &nbsp;
               <a href="index.php?page=mnt_TipoProducto&mode=DEL&id={{codigo_tipo_producto}}"><i class="far fa-trash-alt"></i></a>
            </td>
        </tr>
        {{endfor tipo_producto}}
    </tbody>
</table>
</section>