<h1>Listado de Clientes</h1>
<section class="WWList container-m">
<table>
    <thead>
        <tr>
            <th class="hidden-s">Código</th>
            <th class="hidden-s">Nombre</th>
            <th class="hidden-s">Dirección</th>
            <th class="hidden-s">Télefono</th>
            <th class="hidden-s">Género</th>
            <th class="hidden-s">Correo</th>
            <th >Codigo usuario</th>
            {{if ~CanInsert}}
            <th><a href="index.php?page=mnt_cliente&mode=INS"class="button">+</a></th>
            {{endif ~CanInsert}}
        </tr>
    </thead>
    <tbody>
        {{foreach clientes}}
            <tr>
             
                <td class="hidden-s">{{codigo_cliente}}</td>
                 <td>
                    {{if ~CanView}}
                    <a href="index.php?page=mnt_cliente&mode=DSP&id={{codigo_cliente}}">{{nombre_ciente}}</a>
                   {{endif ~CanView}}
                   {{ifnot ~CanView}}
                        {{codigo_usuario}}
                   {{endifnot ~CanView}}
                </td>
                <td class="hidden-s">{{nombre_ciente}}</td>
                <td class="hidden-s">{{direccion}}</td>
                <td class="hidden-s">{{telefono}}</td>
                <td class="hidden-s">{{genero}}</td>
                <td class="hidden-s">{{correo_electronico}}</td>
                <td >{{codigo_usuario}}</td>
                <td class="center">
                    {{if ~CanUpdate}}
                    <a href="index.php?page=mnt_cliente&mode=UPD&id={{codigo_cliente}}">Editar</a>
                    {{endif ~CanUpdate}}
                    &nbsp;
                     {{if ~CanDelete}}
                    <a href="index.php?page=mnt_cliente&mode=DEL&id={{codigo_cliente}}">Eliminar</a>
                    {{endif ~CanDelete}}

                </td>
            </tr>
        {{endfor clientes}}
    </tbody>
</table>
</section>