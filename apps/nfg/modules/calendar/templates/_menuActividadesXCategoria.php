<div class="btn-toolbar" style="margin: 0; position: relative;">
  <?php foreach($categorias as $categoria): ?>
      <div class="btn-group">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $categoria->getNombre()?> <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url_for('calendar/index');?>">Todos</a></li>
          <li class="divider"></li>
          <?php foreach($categoria->getNFGActividads() as $actividad): ?>
            <li><a href="<?php echo url_for('@XActividad?id='.$actividad->getId());?>"><?php echo $actividad->getNombre()?></a></li>
          <?php endforeach ?>
        </ul>
      </div><!-- /btn-group -->
  <?php endforeach ?>
</div>