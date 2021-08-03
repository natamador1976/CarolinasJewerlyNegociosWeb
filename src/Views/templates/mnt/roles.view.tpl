<h1>Lista de Roles</h1>
<section class="container-md mt-4" style="height:100vh;">
    <table class="table table-info table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Rol</th>
                <th>Estado</th>
                 <th><a href="index.php?page=mnt_rol&mode=INS" class="button"><i class="fas fa-plus"></i></a></th>
            </tr>
        </thead>
        <tbody>
            {{foreach roles}}
            <tr>
                <td>{{codigo_rol}}</td>
                <td>
                <a href="index.php?page=mnt_rol&mode=DSP&id={{desripcion_rol}}">{{descripcion_rol}}</a>
                </td>
                <td>{{estado}}</td>
                <td>
                     <a href="index.php?page=mnt_rol&mode=UPD&id={{codigo_rol}}"><i class="far fa-edit"></i></a>
                     &nbsp;
                      <a href="index.php?page=mnt_rol&mode=DEL&id={{codigo_rol}}"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
            {{endfor roles}}
        </tbody>
    </table>

</section>