<?php use_themes_javascript('jquery/js/jquery-1.6.2.min.js') ?>
<?php use_themes_javascript('colorbox/js/jquery.colorbox.js') ?>
<?php use_javascript('actividades_new') ?>
<?php include_javascripts() ?>

<?php include_partial('actividades/assets') ?>

<div id="sf_admin_container">
  <h3><?php echo __('No conocemos esta actividad, por favor háblanos un poco de ella:', array(), 'messages') ?></h3>

  <?php include_partial('actividades/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('actividades/form_header', array('NfgActividad' => $NfgActividad, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('actividades/form', array('NfgActividad' => $NfgActividad, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('actividades/form_footer', array('NfgActividad' => $NfgActividad, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
