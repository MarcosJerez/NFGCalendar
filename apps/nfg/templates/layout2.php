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

    <div class="btn-toolbar" style="margin: 0; position: relative;">
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Viajes <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('calendar/index');?>">Todos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo url_for('calendar/compartirCoche');?>">Compartir coche</a></li>
          <li><a href="<?php echo url_for('calendar/tarifaMesa');?>">Tarifa Mesa AVE</a></li>
        </ul>
      </div><!-- /btn-group -->
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Deportes <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('calendar/index');?>">Todos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo url_for('calendar/compartirCoche');?>">Compartir coche</a></li>
          <li><a href="<?php echo url_for('calendar/tarifaMesa');?>">Tarifa Mesa AVE</a></li>
        </ul>
      </div><!-- /btn-group -->
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Descuentos para grupos <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('calendar/index');?>">Todos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo url_for('calendar/compartirCoche');?>">Compartir coche</a></li>
          <li><a href="<?php echo url_for('calendar/tarifaMesa');?>">Tarifa Mesa AVE</a></li>
        </ul>
      </div><!-- /btn-group -->
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Otros <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('calendar/index');?>">Todos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo url_for('calendar/compartirCoche');?>">Compartir coche</a></li>
          <li><a href="<?php echo url_for('calendar/tarifaMesa');?>">Tarifa Mesa AVE</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>

    
      <div id="cuerpo">
          <?php echo $sf_content ?>
      </div>
    </div>

  </body>
  <?php //include_partial('global/pie') ?>


</html>
