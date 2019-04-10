<h1>{{modeDsc}}</h1>
<section class="row">
  <form action="index.php?page=factura&mode={{mode}}&codFactura={{codFactura}}"
      method="POST" class="col-8 col-offset-2">
      <input type="hidden" name="codFactura" value="{{codFactura}}" />
      <input type="hidden" name="tocken" value="{{tocken}}" />
      <input type="hidden" name="mode" value="{{mode}}" />


      <div class="row">
        <label class="col-5" for="estFactura" >Estado</label>
        <select name="estFactura" id="estFactura" class="col-7">
          {{foreach categoria}}
            <option value="{{cod}}" {{selected}}>{{dsc}}</option>
          {{endfor categoria}}
        </select>
      </div>




      <div class="row">
        <div class="col-7 col-offset-5 center">
          <button id="btnProcesar">Confirmar</button>
          &nbsp;
          <button id="btnCancelar">Cancelar</button>
        </div>
      </div>

      <script>
        $(document).ready(function(){
          $("#btnCancelar").click(function(e){
              e.preventDefault();
              e.stopPropagation();
              location.assign("index.php?page=facturas");
          });
          $("#btnProcesar").click(function(e){
              e.preventDefault();
              e.stopPropagation();
              /*Se realize las validaciones adecuadas*/
              document.forms[0].submit();
          });
        });
      </script>
    <!--
    prdcod bigint(18) UN AI PK
    prddsc varchar(128)
    prdcodbrr varchar(45)
    prdSKU varchar(45)
    prdStock int(8)
    prdPrcVVnt decimal(13,4)
    prdPrcCpm decimal(13,4)
    prdImgUri varchar(255)
    prdEst char(3)
    prdBio mediumtext
    -->
    </form>
    {{if haserrores}}
    <section class="col-8 col-offset-2">
        {{foreach errores}}
            <div>{{this}}</div>
        {{endfor errores}}
    </section>
    {{endif haserrores}}
</section>
