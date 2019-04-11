


<h1>Gestion de inventario</h1>
<h2>{{nombre}}</h2>
<section  class="row">
<table class="blueTable"  class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Producto</th>

      <th>Cantidad</th>

      <th>
        <a href="index.php?page=inventario&mode=INS&codInventario=" class="btn">
          +
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach inventarios}}
    <tr>
      <td style="text-align:center;" >{{codInventario}}</td>
      <td style="text-align:center;"><a href="index.php?page=inventario&mode=DSP&codInventario={{codInventario}}">{{nomInventario}}</a></td>
<td style="text-align:center;">{{canInventario}}</td>

      <td>
        <form action="index.php" method="GET">
          <input name="page" value="inventario" type="hidden"/>
          <input name="mode" value="UPD" type="hidden"/>
          <input name="codInventario" value="{{codInventario}}" type="hidden"/>
          <button type="submit">Editar</button>
        </form>
        <form action="index.php" method="GET">
          <input name="page" value="inventario" type="hidden" />
          <input name="mode" value="DEL" type="hidden" />
          <input name="codInventario" value="{{codInventario}}" type="hidden" />
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    {{endfor inventarios}}
  </tbody>
</table>
</section>
