<label class="control-label">¿Dónde?</label>
<div class="controls">
  
  <?php if(!is_null($lugar_fin)): ?>
  
  <div>
    <span>Inicio: </span>
    <span><?php echo $lugar_ini->getNombre(); ?> - <?php echo $lugar_ini->getNfgLocalidad()->getNombre(); ?></span>
  </div>  
  <div>
    <span>Fin:</span>
    <span><?php echo $lugar_fin->getNombre(); ?> - <?php echo $lugar_fin->getNfgLocalidad()->getNombre();  ?></span>
  </div>
  
  <?php else: ?>
  
  <div>
    <span><?php echo $lugar_ini->getNombre(); ?> - <?php echo $lugar_ini->getNfgLocalidad()->getNombre(); ?></span>
  </div>  
  
  <?php endif ?>
  
  
</div>