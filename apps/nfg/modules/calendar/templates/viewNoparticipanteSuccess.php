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
        <span>A las <?php echo $convocatoria->getHoraIni();?></span>  
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">¿Cuántos?</label>
      <div class="controls">
        <div>
          <span>Entre </span>
          <span><?php echo $convocatoria->getParticipantesMin();?></span>
          <span> y </span>
          <span><?php echo $convocatoria->getParticipantesMax();?></span>
        </div>
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
    <button type="submit" class="btn btn-primary" formaction="<?php echo url_for('calendar/apuntarse');?>">Me apunto</button>
  </form>
  </div>
</div>