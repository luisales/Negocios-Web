<h1>Gestion de los Paises</h1>
<h2>{{nombre}}</h2>
<section class="row">
<table class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Pais</th>
      <th>Ubicacion</th>
      <th>
        <a href="index.php?page=pais&mode=INS&paiscod=" class="btn">
          +
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach paises}}
    <tr>
      <td>{{paiscod}}</td>
      <td><a href="index.php?page=pais&mode=DSP&paiscod={{paiscod}}">{{paisdsc}}</a></td>
      <td>{{paisgeo}}</td>
      <td>
        <form action="index.php" method="GET">
          <input name="page" value="pais" type="hidden"/>
          <input name="mode" value="UPD" type="hidden"/>
          <input name="paiscod" value="{{paiscod}}" type="hidden"/>
          <button type="submit">Editar</button>
        </form>
        <form action="index.php" method="GET">
          <input name="page" value="pais" type="hidden" />
          <input name="mode" value="DEL" type="hidden" />
          <input name="paiscod" value="{{paiscod}}" type="hidden" />
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    {{endfor paises}}
  </tbody>
</table>
</section>
