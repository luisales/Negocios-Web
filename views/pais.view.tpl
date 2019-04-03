<h1>{{modeDsc}}</h1>
<section class="row">
  <form action="index.php?page=pais&mode={{mode}}&paiscod={{paiscod}}"
      method="POST" class="col-8 col-offset-2">
      <input type="hidden" name="paiscod" value="{{paiscod}}" />
      <input type="hidden" name="tocken" value="{{tocken}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <div class="row">
        <label class="col-5" for="paiscod">Codigo del pais</label>
        <input type="text" id="paiscod" name="paiscod" value="{{paiscod}}"
          placeholder="Codigo del pais" maxlength="3"
            class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="paisdsc">Nombre del pais</label>
        <input type="text" id="paisdsc" name="paisdsc" value="{{paisdsc}}"
          placeholder="Nombre del Pais" maxlength="60"
            class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="paisgeo">Ubicacion del pais</label>
        <input type="text" id="paisgeo" name="paisgeo" value="{{paisgeo}}"
          placeholder="Ubicacion del pais" maxlength="45"
          class="col-7" {{readonly}}/>
      </div>
      <div class="row">
        <label class="col-5" for="paisfecha">Fecha</label>
        <input type="datetime" id="paisfecha"
          name="paisfecha" value="{{paisfecha}}"
          placeholder="Fecha"
          class="col-7" {{readonly}}/>
      </div>
      <div class="row">
      <label class="col-5" for="paisusuario">Codigo de usuario</label>
      <input type="number" min="0" max="99999999" id="paisusuario"
        name="paisusuario" value="{{paisusuario}}"
        placeholder="Codigo de usuario" class="col-7" {{readonly}} />
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
              location.assign("index.php?page=paises");
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
