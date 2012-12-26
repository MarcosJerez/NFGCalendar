<div class="sf_admin_form_row sf_admin_li sf_admin_form_field_invitados">
  <div>Esperando respuesta:</div>
  <?php foreach ($NfgConvocatoria->getNfgInvitados() as $NfgInvitado): ?>
    <li><?php echo $NfgInvitado->getNfgUsuario(); ?><?php echo link_to(image_tag('delete.png'), url_for('convocatorias/desInvitar') . '?id=' . $NfgInvitado->getId() . '&id_convocatoria=' . $NfgConvocatoria->getId()) ?></li>
  <?php endforeach ?>
</div>