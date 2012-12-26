<!DOCTYPE HTML>
<html xml:lang="es" lang="es">
  <head>

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php use_stylesheet('../js/fullcalendar-1.5.4/fullcalendar/fullcalendar.css'); ?> 
    <?php use_javascript('jquery-1.8.2.min.js'); ?>
    <?php use_javascript('fullcalendar-1.5.4/jquery/jquery-ui-1.8.23.custom.min.js'); ?>
    <?php use_javascript('fullcalendar-1.5.4/fullcalendar/fullcalendar.min.js'); ?>
    <?php use_javascript('bootstrap.min.js'); ?>
    <?php use_stylesheet('main.css') ?>
    <?php include_stylesheets() ?>
    
    <?php include_javascripts() ?>
    
    <title>nfg</title>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body >
    
    <div id="contenedor_general">
      <h1>Nosfaltagente.com</h1>

      <?php include_component('calendar','menuActividadesXCategoria'); ?>
    
      <div id="cuerpo">
          <?php echo $sf_content ?>
      </div>
    </div>

  </body>
  <?php //include_partial('global/pie') ?>


</html>
