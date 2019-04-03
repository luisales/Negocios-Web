<h1>{{modeDsc}}</h1>
<section class="row">
  <form action="index.php?page=producto&mode={{mode}}&prdcod={{prdcod}}"
      method="POST" class="col-8 col-offset-2">
      <input type="hidden" name="prdcod" value="{{prdcod}}" />
      <input type="hidden" name="tocken" value="{{tocken}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <div class="row">
        <label class="col-5" for="prddsc">Nombre Producto</label>
        <input type="text" id="prddsc" name="prddsc" value="{{prddsc}}"
          placeholder="Nombre del Producto" maxlength="128"
            class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="prdcodbrr">Código de Barras</label>
        <input type="text" id="prdcodbrr" name="prdcodbrr" value="{{prdcodbrr}}" 
          placeholder="Código de Barras" maxlength="45"
          class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="prdSKU">Código del Producto</label>
        <input type="text" id="prdSKU" name="prdSKU" value="{{prdSKU}}"
          placeholder="Código del Producto" maxlength="45"
          class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="prdStock">Unidades en Inventario</label>
        <input type="number" min="0" max="99999999" step="1" id="prdStock"
          name="prdStock" value="{{prdStock}}"
          placeholder="Unidades en Inventario" maxlength="8"
          class="col-7" {{readonly}}/>
      </div>
      <div class="row">
      <label class="col-5" for="prdPrcVVnt">Precio de Venta</label>
      <input type="number" min="0" max="99999999" id="prdPrcVVnt"
        name="prdPrcVVnt" value="{{prdPrcVVnt}}"
        placeholder="Precio de Venta" class="col-7" {{readonly}} />
      </div>
      <div class="row">
        <label class="col-5" for="prdPrcCpm">Precio de Compra</label>
        <input type="number" min="0" max="99999999" id="prdPrcCpm"
           name="prdPrcCpm" value="{{prdPrcCpm}}"
          placeholder="Precio de Compra" class="col-7" {{readonly}} />
      </div>
      <div class="row">
        <label class="col-5" for="prdImgUri">Url de Imágen</label>
        <input type="text" id="prdImgUri" name="prdImgUri" value="{{prdImgUri}}"
          placeholder="Url de Imagen del Producto" maxlength="255"
          class="col-7" {{readonly}} />
      </div>
      <div class="row">
        <label class="col-5" for="prdEst">Estado</label>
        <select name="prdEst" id="prdEst" class="col-7">
          {{foreach estados}}
            <option value="{{cod}}" {{selected}}>{{dsc}}</option>
          {{endfor estados}}
        </select>
      </div>
      <div class="row">
        <label class="col-12" for="prdBio">Descripción</label>
        <textarea id="prdBio" name="prdBio" class="col-12" {{readonly}}>{{prdBio}}</textarea>
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
              location.assign("index.php?page=productos");
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
