<?php use_helper('I18N', 'Date') ?>
<div class="modal hide in" id="nueva" style="display: block; " aria-hidden="false">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3><?php echo $convocatoria->getNfgActividad()->getNombre(); ?> (<?php echo $convocatoria->getFechaIni('d-m-Y'); ?>)</h3>
  </div>
  <div class="modal-body">
  <form method="POST" class="form-horizontal" action="<?php echo url_for('calendar/apuntarse')?>">
    
    <input type="hidden" name="id" value="<?php echo $convocatoria->getId()?>" />
    
    <div class="control-group">
      <label class="control-label">¿Dónde?</label>
      <div class="controls">
        <div>
          <span>Salida: </span>
          <span><?php echo $convocatoria->getNfgLugarRelatedByIdLugarIni()->getNombre();?> - <?php echo $convocatoria->getNfgLugarRelatedByIdLugarIni()->getNfgLocalidad()->getNombre(); ?></span>
        </div>  
        <div>
          <span>Llegada:</span>
          <span><?php //echo $convocatoria->getNfgLugarRelatedByIdLugarFin()->getNombre();?> - <?php //echo $convocatoria->getNfgLugarRelatedByIdLugarFin()->getNfgLocalidad()->getNombre(); ?></span>
        </div>
      </div>
    </div>
      
    <div class="control-group">
      <label class="control-label">¿Cuándo?</label>
      <div class="controls">
        <input type="hidden" id="day" name="convocatoria[day]" value="2012-11-20">
        <?php $hora_ini = explode(':',$convocatoria->getHoraIni());?>
        <input type="text" class="input-mini" name="convocatoria[hora]" size="2" value="<?php echo $hora_ini[0]?>">
        :
        <input type="text" class="input-mini" name="convocatoria[min]" size="2" value="<?php echo $hora_ini[1]?>">
        <p class="help-inline">Hora del evento.</p>  
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">¿Cuántos?</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on">Mínimo</span>
          <input type="text" class="input-mini" name="convocatoria[participantes_min]" size="2" value="<?php echo $convocatoria->getParticipantesMin();?>">
        </div>
        <div class="input-prepend">
          <span class="add-on">Máximo</span>
          <input type="text" class="input-mini" name="convocatoria[participantes_max]" size="2" value="<?php echo $convocatoria->getParticipantesMax();?>">
        </div>
        <p class="help-inline">Número de participantes incluído tú.</p>
      </div>
    </div>
    
    <ul>
      <li>
        <a target="_blank" href="https://www.facebook.com/<?php $convocatoria->getNfgUsuario()->getIdFbuser()?>"><?php echo $convocatoria->getNfgUsuario()->getAlias()?> (organizador)</a>
      </li>
      <?php $apuntados = $convocatoria->getNfgParticipantes();
      foreach($apuntados as $apuntado): ?>
      <li>
        <a target="_blank" href="https://www.facebook.com/<?php $apuntado->getNfgUsuario()->getIdFbuser()?>"><?php echo $apuntado->getNfgUsuario()->getAlias() ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    <div><?php echo $convocatoria->getFaltan(); ?></div>
    
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    Para apuntarte debes logearte primero
    <fb:login-button scope="manage_groups"></fb:login-button> 
  </form>
  </div>
</div>