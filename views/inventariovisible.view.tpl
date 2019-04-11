
<h2>{{nombre}}</h2>
<section class="row">
<table class="blueTable" class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Producto</th>

      <th>Cantidad</th>

            <th>Cantidad a ingresar</th>

    </tr>
  </thead>
  <tbody>
    {{foreach inventariovisible}}
    <tr>
      <td>{{codInventario}}</td>
  <td>{{nomInventario}}</td>
<td>{{canInventario}}</td>

      <td>
        <form action="index.php" method="GET">
            <input name="page" value="intermedios" type="hidden"/>
            <input name="mode" value="COM" type="hidden"/>
            <input name="cantidad" value="cantidad" type="number"/>

          <input name="codCombo" value="{{codCombo}}" type="hidden" />
          <input name="codInventario" value="{{codInventario}}" type="hidden" />

          <button type="submit">Añadir</button>
        </form>

      </td>
    </tr>
    {{endfor inventariovisible}}
  </tbody>
</table>
</section>
