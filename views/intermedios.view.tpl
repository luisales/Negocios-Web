


<h1>Gestion de Menú</h1>

<section class="row">
<table class="blueTable"  class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Producto</th>

      <th>Cantidad</th>
        <th>Combo</th>
      <th>

        <a href="index.php?page=intermedios&mode=INS&codInventario=" class="btn">
          +
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach intermedios}}
    <tr>
      <td>{{codInventario}}</td>
      <td>{{nomInventario}}</td>
<td>{{canInventario}}</td>
  <td>{{codCombo}}</td>

      <td>

        <form action="index.php" method="GET">
          <input name="page" value="intermedios" type="hidden" />
          <input name="mode" value="DEL" type="hidden" />
          <input name="codCombo" value={{codCombo}} type="hidden" />
          <input name="codInventario" value={{codInventario}} type="hidden" />
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    {{endfor intermedios}}
  </tbody>
</table>
</section>
