<?php use_helper('I18N', 'Date') ?>
<div class="modal hide in" id="nueva" style="display: block; " aria-hidden="false">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3><?php echo $convocatoria->getNfgActividad()->getNombre(); ?> (<?php echo $convocatoria->getFechaIni('d-m-Y'); ?>)</h3>
  </div>
  <div class="modal-body">
  <form method="POST" class="form-horizontal" action="<?php echo url_for('calendar/desapuntarse')?>">
    
    <input type="hidden" name="id" value="<?php echo $convocatoria->getId()?>" />
        
    <div class="control-group">
      <?php include_partial('donde',array('lugar_ini'=>$convocatoria->getNfgLugarRelatedByIdLugarIni(),'lugar_fin'=>$convocatoria->getNfgLugarRelatedByIdLugarFin())); ?>
    </div>
      
    <div class="control-group">
      <label class="control-label">¿Cuándo?</label>
      <div class="controls">
        <span>A las <?php echo $convocatoria->getHoraIni();?></span>  
      </div>
    </div>
    <div class="control-group">
      <?php include_partial('cuantos',array('min'=>$convocatoria->getParticipantesMin(),'max'=>$convocatoria->getParticipantesMax())); ?>
    </div>
    
    <ul>
      <li>
        <a target="_blank" href="https://www.facebook.com/<?php $convocatoria->getNfgUsuario()->getIdFbuser()?>"><?php echo $convocatoria->getNfgUsuario()->getAlias()?></a> (organizador)
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
    <button type="submit" class="btn btn-danger" formaction="<?php echo url_for('calendar/desapuntarse');?>">Me desapunto</button>
  </form>
  </div>
</div>