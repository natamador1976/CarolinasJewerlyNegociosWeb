<h1>Listado de Productos </h1>
<section class="WWList container-m">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th class="hiden-s">Producto</th>
                <th class="hiden-s">Descripción</th>
                <th class="hiden-s">Precio</th>
                <th class="hiden-s">Stock</th>
                <th class="hiden-s">Categoria</th>
                <th class="hiden-s">Tipo Producto</th>
                <th class="hidden-s">UriImg</th>
                <th><a href="index.php?page=mnt_producto&mode=INS" class="button">+</a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach productos}}
            <tr>
                <td>{{codigo_producto}}</td>
                <td class="hidden-s">
                    <a href="index.php?page=mnt_producto&mode=DSP&id={{codigo_producto}}">{{nombre_producto}}</a>
                </td>
                <td class="hidden-s">{{descripcion_producto}}</td>
                <td class="hidden-s">{{precio}}</td>
                <td class="hidden-s">{{cantidad_stock}}</td>
                <td class="hidden-s">{{codigo_categoria}}</td>
                <td class="hidden-s">{{codigo_tipo_producto}}</td>
                <td class="hidden-s">{{uri_img}}</td>
                <td class="center">
               <a href="index.php?page=mnt_producto&mode=UPD&id={{codigo_producto}}"> Editar </a>
            &nbsp;
               <a href="index.php?page=mnt_producto&mode=DEL&id={{codigo_producto}}">Eliminar</a>
        </td>
            </tr>
            {{endfor productos}}
        </tbody>
    </table>

</section>