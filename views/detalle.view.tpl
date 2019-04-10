


<h1>Detalle</h1>
<h2>{{nombre}}</h2>
<section class="row">
<table   class="col-10 col-offset-1">
  <thead>
    <tr>
      <th>Código</th>
      <th>Código de Combo</th>
      <th>Cantidad</th>
    </tr>
  </thead>
  <tbody>
    {{foreach detalle}}
    <tr>
      <td>{{detFactura}}</td>
      <td>{{codCombo}}</a></td>
      <td>{{cantidad}}</td>

    </tr>
    {{endfor detalle}}
  </tbody>
</table>
</section>
