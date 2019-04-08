<section class="row">

        <div>
        <div>
          <div >
            <h2 class=" col-s-12">Pollo</h2>
            <div >
              {{foreach pollos}}
                <div class="col-s-6 col-m-4 col-4"><div class="col-s-12 card"><a class=""><h4>{{desCombo}}</h4><p>L. {{preCombo}}</p> <br> <p>{{comCombo}}</p> <button id="btnProcesar">Agregar al carro</button><img style="width:200px;" src={{urlCombo}} alt=""></a></div></div>
                {{endfor pollos}}
            </div>
           </div>
          </div>

      </div>

    </section>
