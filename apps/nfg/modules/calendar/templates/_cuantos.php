<label class="control-label">¿Cuántos?</label>
<div class="controls">
  
  <?php if(!is_null($min) && !is_null($max)): ?>
    
    <?php if($min == $max): ?>
    <div>
      <span><?php echo $min; ?></span>
    </div>
    <?php elseif($max > $min): ?>
    <div>
      <span>Entre </span>
      <span><?php echo $min; ?></span>
      <span> y </span>
      <span><?php echo $max; ?></span>
    </div>
    <?php else: ?>
    <div>
      <span><?php echo $min; ?></span>
    </div>
    <?php endif ?>
  
  <?php elseif(!is_null($min) && is_null($max)): ?>
    <div>
      <span>A partir de <?php echo $min; ?> personas</span>
    </div>
  <?php elseif(is_null($min) && !is_null($max)): ?>
    <div>
      <span>Hasta <?php echo $min; ?> personas como máximo</span>
    </div>
  <?php endif ?>
</div>