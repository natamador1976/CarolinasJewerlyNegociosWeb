<h1>Listado de Hero Items para el Index</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>#</th>
          <th>Categoria</th>
          <th class="hidden-s">Descripción</th>
          <th><a href="index.php?page=mnt_categoria&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach categorias}}
    <tr>
      <td>{{codigo_categoria}}</td>
      <td><a href="index.php?page=mnt_categoria&mode=DSP&id={{codigo_categoria}}">{{nombre_categoria}}</a></td>
      <td class="hidden-s">{{descripcion_categoria}}</td>
      <td class="center">
        <a href="index.php?page=mnt_categoria&mode=UPD&id={{codigo_categoria}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_categoria&mode=DEL&id={{codigo_categoria}}">Eliminar</a>
      </td>
    </tr>
    {{endfor categorias}}

  </tbody>
</table>
</section>