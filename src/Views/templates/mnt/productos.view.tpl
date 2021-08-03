<h1>Listado de Productos </h1>
<section class="container-md mt-3" style="height: 100vh;" >
    <table class="table table-info table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th class="hiden-s">Producto</th>
                <th class="hiden-s">Descripción</th>
                <th class="hiden-s">Precio</th>
                <th class="hiden-s">Stock</th>
                 <th class="hiden-s">Tipo Producto</th>
                <th class="hiden-s">Categoria</th>
                <th class="hidden-s">UriImg</th>
                {{if CanInsert}}
                <th><a href="index.php?page=mnt_producto&mode=INS" class="button"><i class="fas fa-plus"></i></a></th>
                 {{endif CanInsert}}          
            </tr>
        </thead>
        <tbody>
            {{foreach productos}}
            <tr>
                <td>{{codigo_producto}}</td>
                <td class="hidden-s">
                    {{if ~CanView}}
                    <a href="index.php?page=mnt_producto&mode=DSP&id={{codigo_producto}}">{{nombre_producto}}</a>
                    {{endif ~CanView}}
                    {{ifnot ~CanView}}
                    {{nombre_producto}}
                    {{endifnot ~CanView}}
                   
                </td>
                <td class="hidden-s">{{descripcion_producto}}</td>
                <td class="hidden-s">{{precio}}</td>
                <td class="hidden-s">{{cantidad_stock}}</td>
                <td class="hidden-s">{{codigo_tipo_producto}}</td>
                <td class="hidden-s">{{codigo_categoria}}</td>
                <td class="hidden-s">{{uri_img}}</td>
                <td class="center">
                 {{if ~CanUpdate}}
               <a href="index.php?page=mnt_producto&mode=UPD&id={{codigo_producto}}"><i class="far fa-edit"></i></a>
                 {{endif ~CanUpdate}}
                &nbsp;
                {{if ~CanDelete}}
               <a href="index.php?page=mnt_producto&mode=DEL&id={{codigo_producto}}"><i class="far fa-trash-alt"></i></a>
                {{endif ~CanDelete}}
        </td>
            </tr>
            {{endfor productos}}
        </tbody>
    </table>

</section>