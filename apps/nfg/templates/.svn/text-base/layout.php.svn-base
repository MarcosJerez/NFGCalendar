<!DOCTYPE HTML>
<html xml:lang="es" lang="es">
  <head>

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php use_stylesheet('../themesPlugin/themes/default/jquery/themes/humanity/jquery-ui-1.8.16.custom.css') ?>
    <?php use_stylesheet('../sfFormExtraPlugin/css/jquery.autocompleter.css') ?>
    <?php //use_stylesheet('../themesPlugin/themes/default/colorbox/css/colorbox.css') ?>
    <?php include_stylesheets() ?>
    <?php //use_javascript('../themesPlugin/themes/default/jquery/js/jquery-1.6.2.min.js') ?>
    <?php //use_javascript('../themesPlugin/themes/default/jquery/js/jquery-ui-1.8.16.custom.min.js') ?>
    <?php use_javascript('../sfFormExtraPlugin/js/jquery.autocompleter.js') ?>
    <?php //use_javascript('../ActivosPlugin/js/colorbox/jquery.colorbox.js') ?>
    <?php use_javascript('jquery.alphanumeric.js') ?>
    <?php use_javascript('nfg') ?>
    <?php include_javascripts() ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=ES"> </script>

    <title>nfg</title>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body onload="initialize()">
    <div id="contenedor_general">

      <div id="cabecera">
        <div id="config_usuario" class="personal">
          <?php include_component('sftGestorSesion', 'compUsuario') ?>
          <?php include_component('sftGestorSesion', 'compMenuGeneral') ?>
        </div>
        <div id="menu">
          <ul>
            <li><a id="misconvocatorias" href="<?php echo url_for('convocatorias/index'); ?>">INICIO</a></li>
            <li><a id="nuevo" href="<?php echo url_for('convocatorias/new'); ?>">NUEVA CONVOCATORIA</a></li>
            <li><a id="buscar" href="<?php echo url_for('convocatoriaBusqueda/index'); ?>">BUSCAR CONVOCATORIAS</a></li>
            <li><a id="mi_perfil" href="<?php echo url_for('perfil/index'); ?>">MI PERFIL</a></li>
          </ul>
        </div>

      </div>




      <div id="cuerpo">
        <div id="general">
          <?php echo $sf_content ?>
        </div>
        <div id="lateral">
          <h2>Calendario</h2>
          <?php include_partial('global/calendario'); ?>


        </div>


        <div id="pie">
          <h1>Ranking de convocatorias</h1>
          <div id="lista_localidades" style="width: 40%; height: 80px;">
            <h6>Por localidad</h6>
            <?php include_component('convocatorias','rankingLocalidad');?>
          </div>

          <div id="lista_actividades" style="width: 40%; height: 80px;">
            <h6>Por actividad</h6>
            <?php include_component('convocatorias','rankingActividad');?>
          </div>
          
        </div>
      </div>
    </div>

  </body>
  <?php include_partial('global/pie') ?>


</html>
