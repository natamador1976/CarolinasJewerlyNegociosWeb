<h1>Listado de Suscripciones</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>#</th>
          <th>Codigo Suscripción</th>
          <th>Codigo Usuario</th>
          <th>Estado</th>
          <th><a href="index.php?page=mnt_suscripcion&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach suscripciones}}
    <tr>
      <td>{{rownum}}</td>
      <td><a href="index.php?page=mnt_suscripcion&mode=DSP&id={{codigo_suscripcion}}">{{codigo_usuario}}</a></td>
      <td class="hidden-s">{{codigo_usuario}}</td>
      <td>{{estado}}</td>
      <td class="center">
        <a href="index.php?page=mnt_suscripcion&mode=UPD&id={{codigo_suscripcion}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_suscripcion&mode=DEL&id={{codigo_suscripcion}}">Eliminar</a>
      </td>
    </tr>
    {{endfor suscripciones}}

  </tbody>
</table>
</section>