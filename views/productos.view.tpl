<h1>Gestion de productos</h1>
<h2>{{nombre}}</h2>
<section class="row">
<table class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Producto</th>
      <th>Estado</th>
      <th>Precio Venta</th>
      <th>
        <a href="index.php?page=producto&mode=INS&prdcod=" class="btn">
          +
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach productos}}
    <tr>
      <td>{{prdcod}}</td>
      <td><a href="index.php?page=producto&mode=DSP&prdcod={{prdcod}}">{{prddsc}}</a></td>
      <td>{{prdEst}}</td>
      <td>{{prdPrcVVnt}}</td>
      <td>
        <form action="index.php" method="GET">
          <input name="page" value="producto" type="hidden"/>
          <input name="mode" value="UPD" type="hidden"/>
          <input name="prdcod" value="{{prdcod}}" type="hidden"/>
          <button type="submit">Editar</button>
        </form>
        <form action="index.php" method="GET">
          <input name="page" value="producto" type="hidden" />
          <input name="mode" value="DEL" type="hidden" />
          <input name="prdcod" value="{{prdcod}}" type="hidden" />
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    {{endfor productos}}
  </tbody>
</table>
</section>
