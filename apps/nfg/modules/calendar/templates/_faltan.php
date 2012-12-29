<?php if (!is_null($max) && ($num >= $max)): ?>

    <div>
      <span>¡Completo!</span>
    </div>
 
<?php elseif (!is_null($max) && !is_null($min) && ($num < $max) && ($num > $min)): ?>

    <div>
      <span>Aún quedan <?php echo ($max-$num) ?> plazas. ¡Apúntante!</span>
    </div>

<?php elseif (!is_null($min) && ($num < $min)): ?>

    <div>
      <span>Faltan <?php echo ($min-$num) ?> plazas. ¡Apúntante!</span>
    </div>

<?php elseif (!is_null($min) && is_null($max)): ?>
  <div>
    <span>A partir de <?php echo $min; ?> personas</span>
  </div>
<?php elseif (is_null($min) && !is_null($max)): ?>
  <div>
    <span>Hasta <?php echo $min; ?> personas como máximo</span>
  </div>
<?php  endif ?>