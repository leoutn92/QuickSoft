<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>PHPSimplex</title>
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" href="./estilosimplex.css">
  <script type="text/javascript" src="./scripts.js"></script>
  <script type="text/javascript" src="../jquery.min.js"></script>
  <meta name="robots" content="index,follow" />
  <meta name="description" content="PHPSimplex es una herramienta online para resolver problemas de programaci&oacute;n lineal. Su uso es libre y gratuito." />
</head>

<body id="simplex">
  <div id="credits-back"></div>
  <div id="credits">
    <div id="credits-close">X</div>
    <p><span class="Estilo1">PHPSimplex</span><br />
      <span class="Estilo2 padding">Versi&oacute;n 0.81</span>
    </p>
  <p class="Estilo3">Copyright &copy;2006-2018. Todos los derechos reservados.</p>
    <p class="Estilo3">Desarrollado por:<br />
      <span class="negrita padding">Daniel Izquierdo Granja</span><br />
      <span class="negrita padding">Juan Jos&eacute; Ruiz Ruiz</span>
    </p>
      <p class="Estilo3">Traducci&oacute;n a ingl&eacute;s por:<br />
        <span class="negrita padding">Luciano Miguel Tobaria</span>
      </p>
    <p class="Estilo3">Traducci&oacute;n a franc&eacute;s por:<br />
      <span class="negrita padding">Ester Rute Ruiz</span>
    </p>
    <p class="Estilo3">Traducci&oacute;n a portugu&eacute;s por:<br />
      <span class="negrita padding">Rosane Bujes</span>
    </p>
  </div>  <h1 class="titulo">PHPSimplex</h1>
  <div id="winmenu"><ul>
    <li><a href="./simplex.htm?l=es">Inicio</a></li>
    <li><a href="../teoria_metodo_simplex.htm" target="_blank">Teor&iacute;a</a></li>
    <li><a href="../ejemplo_metodo_simplex.htm" target="_blank">Ejemplo</a></li>
    <li><span>Ayuda</span>
      <ul>
        <li><a href="../ayuda.htm" target="_blank">Tutorial</a></li>
        <li><a href="#" onClick="favoritos('es')">Favoritos</a></li>
        <li><a href="#" onClick="Ventana('../updates.htm','Versiones','640','480','yes');">Cambios</a></li>
        <li><a href="#" id="creditos">Acerca de</a></li>
      </ul>
    </li>
    <li><a href="../index.htm">Salir</a></li>
    <li><a href="https://twitter.com/share" class="twitter twitter-share-button" data-url="http://www.phpsimplex.com" data-text="PHPSimplex" data-via="PHPSimplex" data-lang="es">Twittear</a>
      <script>CreateAsyncProcess('http://platform.twitter.com/widgets.js');</script>
    </li>
    <li style="margin-top:3px">
      <script type="text/javascript">//<![CDATA[
        document.write(unescape('%3C%67%3A%70%6C%75%73%6F%6E%65%20%73%69%7A%65%3D%22%6D%65%64%69%75%6D%22%20%68%72%65%66%3D%22%68%74%74%70%3A%2F%2F%77%77%77%2E%70%68%70%73%69%6D%70%6C%65%78%2E%63%6F%6D%22%3E%3C%2F%67%3A%70%6C%75%73%6F%6E%65%3E'));
        window.___gcfg = {lang: 'es'};
        CreateAsyncProcess('https://apis.google.com/js/plusone.js');
      //]]></script>
    </li>
    <li>
      <div id="facebook">
        <script type="text/javascript">//<![CDATA[
          CreateAsyncProcess('http://connect.facebook.net/es_ES/all.js#xfbml=1&appId=604677392918473');
          var fb=document.createElement('fb:like');
          fb.setAttribute("href","http://www.phpsimplex.com");
          fb.setAttribute("layout","button_count");
          fb.setAttribute("show_faces","false");
          fb.setAttribute("width","100");
          fb.setAttribute("font","tahoma");
          document.getElementById("facebook").appendChild(fb);
        //]]></script>
      </div>
    </li>
  </ul></div>  <h2>PHPSimplex</h2>
      <div class="banner texto-centro">
      <script type="text/javascript"><!--
        google_ad_client = "ca-pub-4529599411157549";
        /* 728 x 90 para phpsimplex tool */
        google_ad_slot = "5372872351";
        google_ad_width = 728;
        google_ad_height = 90;
        //-->
      </script>
      <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
    <br />
  <form id="formulario" action="page1.php" method="get" style="text-align:center;">
    <input type="hidden" name="l" value="es">
    <p>M&eacute;todo:     <select id="metodo" name="metodo">
      <option value="simplex" selected>Simplex / Dos Fases</option>
      <option value="grafico">Gr&aacute;fico</option>
    </select></p>
    <p>&iquest;Cu&aacute;ntas variables de decisi&oacute;n tiene el problema?  <input id ="v" name="v" type="text" size="5"></p>
    <p>&iquest;Cu&aacute;ntas restricciones?  <input name="rt" type="text" size="5"></p>
    <p><input class="button gray" type="submit" name="Submit" onClick="enviar(this.form)" value="Continuar"></p>
  </form>
  <script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-490691-1', 'auto');
    ga('send', 'pageview');
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#metodo').change(function(){
      if($('#metodo').val() == 'grafico'){
        var action = 'grafico1.php';
        $('#v').val('2');
        $('#v').prop('readonly', true);
      }
      else{
        var action = 'page1.php';
        $('#v').val('');
        $('#v').prop('readonly', false);
      }
      $('#formulario').attr('action', action);
    });
    //Abrir al hacer click
    $('#creditos').click(function(){
      $("#credits-back").fadeIn();
      $("#credits").fadeIn();
    });
    //Cerrar al hacer click fuera
    $("#credits-back").click(function(){
      $(this).fadeOut();
      $("#credits").fadeOut();
    });
    //Cerrar al hacer click sobre la X
    $("#credits-close").click(function(){
      $("#credits-back").fadeOut();
      $("#credits").fadeOut();
    });
  });
  </script>
</body>
</html>