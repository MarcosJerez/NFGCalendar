<div class="btn-toolbar" style="margin: 0; position: relative;">
  <?php foreach($categorias as $categoria): ?>
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $categoria->getNombre()?> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('@XCategoria?id='.$categoria->getId());?>">Todas</a></li>
          <li class="divider"></li>
          <?php foreach($categoria->getNFGActividadsOrdenadas() as $actividad): ?>
            <li><a href="<?php echo url_for('@XActividad?id='.$actividad->getId());?>"><?php echo $actividad->getNombre()?></a></li>
          <?php endforeach ?>
        </ul>
      </div><!-- /btn-group -->
  <?php endforeach ?>
</div>