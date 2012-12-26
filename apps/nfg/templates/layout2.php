<!DOCTYPE HTML>
<html xml:lang="es" lang="es">
  <head>

    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php use_stylesheet('main.css') ?>
    <?php include_stylesheets() ?>
    
    <?php include_javascripts() ?>
    
    <title>nfg</title>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body >
    
    <div id="contenedor_general">
    <h1>Nosfaltagente.com</h1>

    <div class="btn-toolbar" style="margin: 0;">
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


    
    <div style="width:100%">
      <span style="margin-left: 15%;"><a href="<?php echo url_for('calendar/index');?>">Todos</a></span>
      <span style="margin-left: 15%;"><a href="<?php echo url_for('calendar/tarifaMesa');?>">Tarifa Mesa AVE</a></span>
      <span style="margin-left: 15%;"><a href="<?php echo url_for('calendar/compartirCoche');?>">Compartir Coche</a></span>
    </div>
    
      <div id="cuerpo">
        
          <?php echo $sf_content ?>

       
      </div>
    </div>

  </body>
  <?php //include_partial('global/pie') ?>


</html>
