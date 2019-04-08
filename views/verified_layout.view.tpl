<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>{{page_title}}</title>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <link rel="stylesheet" href="public/css/papier.css" />
            <link rel="stylesheet" href="public/css/estilo.css" />
            <link rel="stylesheet" href="public/css/grid.css" />
            <script src="public/js/jquery.min.js"></script>
            {{foreach css_ref}}
                <link rel="stylesheet" href="{{uri}}" />
            {{endfor css_ref}}
        </head>
        <header class="row" id="home">
          <br><br>
          <br><br><br><br>
           <nav class="Secundario" class="tab-content row">
                 <ul  class="row">
                   <li  class="col-s-12 col-m-4 col-x"><a href="Historias.html">Historia</a></li>
                   <li  class="col-s-12 col-m-4 col-x"><a href="Empleo.html">Empleo</a></li>
                   <li  class="col-s-12 col-m-4 col-x"><a href="Ayudas.html">Donaciones</a></li>
                   <li  class="col-s-12 col-m-6 col-x"><a href="Calidad.html">Calidad de Comida</a></li>
                    <li  class="col-s-12 col-m-6 col-x"><a href="Contacto.html">Contáctactanos</a></li>
                   </ul>
                 </nav>
                 <nav class="Principal" class="tab-content row">
                   <ul class="row">
                     <li class="col-s-12 col-m-6 col-4"><a href="MenuPollio.html">MENU</a></li>
                     <li class="col-s-12 col-m-6 col-4"><a href="MenuPrincipal.html">MENU PRINCIPAL</a></li>
                     <li class="col-s-12 .col-offset-m-6  col-4"><a href="Encuentranos.html">UBICACION</a></li>

                   </ul>
                 </nav>
        </header>
        <body>
            <div class="menu">
                <div class="brand">{{page_title}}</div>
                <ul>
                    {{if notifnum}}
                    <li><a href="index.php?page=notificacion">
                      <span class="ion-android-notifications">&nbsp;{{notifnum}}</span></a>
                    </li>
                    {{endif notifnum}}
                    {{foreach appmenu}}
                      <li><a href="index.php?page={{mdlprg}}">{{mdldsc}}</a></li>
                    {{endfor appmenu}}
                    <li><a href="index.php?page=logout">Cerrar Sesión</a></li>
                </ul>
                <div class="hbtn"> <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div></div>
            </div>
            <div class="contenido">
                {{{page_content}}}
            </div>
            <nav class="Ultimo">
              <ul>
                <li><a href="MenuPollio.html">MENU</a></li>
                <li><a href="MenuPrincipal.html">MENU PRINCIPAL</a></li>
                <li><a href="Encuentranos.html">UBICACION</a></li>
                <li><a href="#home">subir /\</a></li>
              </ul>
            </nav>
            <div class="footer">
                Derechos Reservados 2018
            </div>
            {{foreach js_ref}}
                <script src="{{uri}}"></script>
            {{endfor js_ref}}
            <script>
              $().ready(function(e){
                $(".hbtn").click(function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  $(".menu").toggleClass('open');
                  });
              });
            </script>
        </body>

    </html>
