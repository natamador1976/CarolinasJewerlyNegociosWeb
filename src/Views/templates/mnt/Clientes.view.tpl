<h1>Listado de Clientes</h1>
<section class="container-md">
<table  class="table table-info table-striped">
    <thead>
        <tr>
            <th >#</th>
            <th class="hidden-s">Nombre</th>
            <th class="hidden-s">Dirección</th>
            <th class="hidden-s">Télefono</th>
            <th class="hidden-s">Género</th>
            <th class="hidden-s">Correo</th>
            <th class="hidden-s">Codigo usuario</th>
            <th><a href="index.php?page=mnt_cliente&mode=INS"class="button"><i class="fas fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        {{foreach clientes}}
            <tr>
                <td >{{codigo_cliente}}</td>
                 <td> 
                    <a href="index.php?page=mnt_cliente&mode=DSP&id={{codigo_cliente}}">{{nombre_ciente}}</a>
                </td>
                <td>{{nombre_ciente}}</td>
                <td>{{direccion}}</td>
                <td>{{telefono}}</td>
                <td>{{genero}}</td>
                <td>{{correo_electronico}}</td>
                <td >{{codigo_usuario}}</td>
                <td class="center">
                 
                    <a href="index.php?page=mnt_cliente&mode=UPD&id={{codigo_cliente}}"><i class="far fa-edit"></i></a>
             
                    &nbsp;
               
                    <a href="index.php?page=mnt_cliente&mode=DEL&id={{codigo_cliente}}"><i class="far fa-trash-alt"></i></a>
                  
                </td>
            </tr>
        {{endfor clientes}}
    </tbody>
</table>
</section>
