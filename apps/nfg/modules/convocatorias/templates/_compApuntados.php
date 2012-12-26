<div class="sf_admin_form_row sf_admin_li sf_admin_form_field_apuntados">
  <div>Se han apuntado:</div>
  <li><b><?php echo $NfgConvocatoria->getNfgUsuario(); ?></b></li>
  <?php foreach ($NfgConvocatoria->getNfgParticipantes() as $NfgParticipante): ?>
    <li><?php echo $NfgParticipante->getNfgUsuario(); ?></li>
  <?php endforeach ?>
  <?php foreach ($NfgConvocatoria->getNfgApuntados() as $oApuntado): ?>
    <li><?php echo $oApuntado->getApuntado(); ?> <?php echo link_to(image_tag('delete.png'), url_for('convocatorias/desapuntar') . '?id=' . $oApuntado->getId() . '&id_convocatoria=' . $NfgConvocatoria->getId()); ?></li>
  <?php endforeach ?>
</div>