


<h1>Gestion de Facturas</h1>
<h2>{{nombre}}</h2>
<section class="row">
<table class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Fecha</th>
      <th>Estado</th>
      <th>Hora</th>

      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach facturas}}
    <tr>
      <td>{{codFactura}}</td>
      <td><a href="index.php?page=factura&mode=DSP&codFactura={{codFactura}}">{{fecFactura}}</a></td>
<td>{{estFactura}}</td>
      <td>{{horFactura}}</td>
      <td>
        <form action="index.php" method="GET">
          <input name="page" value="factura" type="hidden"/>
          <input name="mode" value="UPD" type="hidden"/>
          <input name="codFactura" value="{{codFactura}}" type="hidden"/>
          <button type="submit">Editar</button>
        </form>


      </td>
    </tr>
    {{endfor facturas}}
  </tbody>
</table>
</section>
