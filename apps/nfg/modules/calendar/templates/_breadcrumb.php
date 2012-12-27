<?php if(isset($categoria)): ?>

<ul class="breadcrumb">
  <li><a href="<?php echo url_for('@calendar_index')?>">Todas</a> <span class="divider">-></span></li>
  <li class="active"><?php echo $categoria->getNombre()?></li>
</ul>

<?php elseif(isset($actividad)): ?>
  <?php $categoria = $actividad->getNFGCategoria()?>

  <ul class="breadcrumb">
    <li><a href="<?php echo url_for('@calendar_index')?>">Todas</a> <span class="divider">-></span></li>
    <?php if(!is_null($categoria)): ?>
      <li><a href="<?php echo url_for('@XCategoria?id='.$categoria->getId());?>"><?php echo $categoria->getNombre()?></a> <span class="divider">-></span></li>
    <?php endif ?>
    <li class="active"><?php echo $actividad->getNombre()?></li>
  </ul>

<?php endif; ?>
