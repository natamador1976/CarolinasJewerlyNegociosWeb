<h1>Empleados Registrados</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>Cod</th>
          <th>Identidad</th>
          <th>Nombre</th>
          <th>Nacimiento</th>
          <th>Genero</th>
          <th>Contrato</th>
          <th>Foto</th>
          <th>Puesto</th>
          <th>Estado</th>
          <th>Usuario</th>
       
         
          <th><a href="index.php?page=mnt_Empleado&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach empleados}}
    <tr>
      <td>{{codigo_empleado}}</td>
      <td><a href="index.php?page=mnt_user&mode=DSP&id={{codigo_empleado}}">{{num_identidad}}</a></td>
      <td class="hidden-s">{{nombre_empleado}}</td>
      <td class="hidden-s">{{fecha_nacimiento}}</td>
      <td class="hidden-s">{{genero}}</td>
      <td class="hidden-s">{{fecha_contrato}}</td>
      <td class="hidden-s">{{foto_empleado}}</td>
      <td class="hidden-s">{{puesto}}</td>
      <td class="hidden-s">{{estado}}</td>
      <td class="hidden-s">{{cod_usuario}}</td>
      <td class="center">
        <a href="index.php?page=mnt_Empleado&mode=UPD&id={{codigo_empleado}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_Empleado&mode=DEL&id={{codigo_empleado}}">Eliminar</a>
      </td>
    </tr>
    {{endfor empleados}}

  </tbody>
</table>
</section>