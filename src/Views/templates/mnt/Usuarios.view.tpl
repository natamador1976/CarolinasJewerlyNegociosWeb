<h1>Usuarios Registrados</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>Cod</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>UsuarioCod</th>
          <th>FechaCreacion</th>
          <th>Tipo de Usuario</th>
          <th>Estado</th>
         
          <th><a href="index.php?page=mnt_user&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach usuarios}}
    <tr>
      <td>{{codigo_usuario}}</td>
      <td><a href="index.php?page=mnt_user&mode=DSP&id={{codigo_usuario}}">{{nombre_usuario}}</a></td>
      <td class="hidden-s">{{correo_electronico}}</td>
      <td class="hidden-s">{{usuarioactcod}}</td>
      <td class="hidden-s">{{fecha_creacion}}</td>
      <td class="hidden-s">{{tipo_usuario}}</td>
      <td class="hidden-s">{{estado}}</td>
      <td class="center">
        <a href="index.php?page=mnt_user&mode=UPD&id={{codigo_usuario}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_user&mode=DEL&id={{codigo_usuario}}">Eliminar</a>
      </td>
    </tr>
    {{endfor usuarios}}

  </tbody>
</table>
</section>