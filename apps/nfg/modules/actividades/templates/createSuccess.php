<?php use_themes_javascript('jquery/js/jquery-1.6.2.min.js') ?>
<?php use_javascript('actividades_new') ?>
<?php include_javascripts() ?>

<?php include_partial('actividades/assets') ?>

<div id="sf_admin_container">
  <h3><?php echo __('La nueva actividad ha sido dada de alta, gracias por colaborar con nosfaltagente.com', array(), 'messages') ?></h3>

  <input type="button" value="<?php echo __("Cerrar");?>" onclick="parent.$.colorbox.close();"/>

 
</div>
