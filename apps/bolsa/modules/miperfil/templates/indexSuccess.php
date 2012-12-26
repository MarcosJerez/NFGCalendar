<?php use_themes_javascript('jquery/js/jquery-1.6.2.min.js');?>
<?php use_javascript('../sfFormExtraPlugin/js/jquery.autocompleter.js');?>
<div id="content">

  <h1>Mis datos</h1>

  <div class="">
    <form method="POST" action="<?php echo url_for('miperfil/setDisponibilidad');?>">
      <label for=""><?php echo __('Disponibilidad: (horas / semana)');?></label>
      <input type="text" id="" value="<?php echo $disp ?>" name="disponibilidad" class="" placeholder="" >
      <input type="submit" name="guardar" value="Guardar" />
    </form>
  </div>
  
  <h1>Editar aptitudes y conocimientos</h1>

  <div class="">
    <ul>
      <?php foreach($habilidades as $usu_habilidad): ?>
        <span class="habilidad"><?echo $usu_habilidad->getBolHabilidad()->getNombre() ?></span>
        <a href="<?php echo url_for("miperfil/deleteHabilidad?id=".$usu_habilidad->getId())?>">
          <img src="<?php echo public_path('themesPlugin/themes/default/sfadmin/images/delete.png')?>"/>
        </a>
      <?php endforeach; ?>
    </ul>
    <form method="POST" action="<?php echo url_for('miperfil/addHabilidad');?>"> 
      <?php echo $formHabilidad['id']->render(); ?>
      <input type="submit" name="add" value="Añadir" />
    </form>
    
  </div>
  
</div>