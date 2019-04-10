


<h1>Gestion de combos y productos</h1>
<h2>{{nombre}}</h2>
<section class="row">
<table class="blueTable" class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Combo</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>Categoria</th>
      <th>
        <a href="index.php?page=combo&mode=INS&codCombo=" class="btn">
          +
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    {{foreach combos}}
    <tr>
      <td>{{codCombo}}</td>
      <td><a href="index.php?page=combo&mode=DSP&codCombo={{codCombo}}">{{desCombo}}</a></td>
<td>{{preCombo}}</td>
      <td>{{comCombo}}</td>
      <td>{{catCombo}}</td>
      <td>
        <form action="index.php" method="GET">
          <input name="page" value="combo" type="hidden"/>
          <input name="mode" value="UPD" type="hidden"/>
          <input name="codCombo" value="{{codCombo}}" type="hidden"/>
          <button type="submit">Editar</button>
        </form>

        <form action="index.php" method="GET">
          <input name="page" value="intermedios" type="hidden" />
          <input name="mode" value="COM" type="hidden" />
          <input name="codCombo" value="{{codCombo}}" type="hidden" />
            <input name="codInventario" value="" type="hidden" />
          <button type="submit">Contenido</button>
        </form>
      </td>
    </tr>
    {{endfor combos}}
  </tbody>
</table>
</section>
