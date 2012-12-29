<label class="control-label">¿Dónde?</label>
<div class="controls">
  
  <?php if(!is_null($lugar_ini)): ?>
  <div class="input-prepend">
    <span class="add-on">Inicio</span>
    <input type="hidden" id="lugar_ini" name="convocatoria[id_lugar_ini]" value="<?php echo $lugar_ini->getId()?>"></input>
    <input type="text" class="input-large" id="autocomplete_lugar_ini" name="autocomplete[lugar_ini]" value="<?php echo $lugar_ini->getNombre()?>" autocomplete="off" required="required"></input>
  </div>
  <?php else: ?>
  <div class="input-prepend">
    <span class="add-on">Inicio</span>
    <input type="hidden" id="lugar_ini" name="convocatoria[id_lugar_ini]"></input>
    <input type="text" class="input-large" id="autocomplete_lugar_ini" name="autocomplete[lugar_ini]" autocomplete="off" required="required"></input>
  </div>
  <?php endif ?>
  
  <?php if(!is_null($lugar_fin)): ?>
  <div class="input-prepend">
    <span class="add-on">Fin</span>
    <input type="hidden" id="lugar_fin" name="convocatoria[id_lugar_fin]" value="<?php echo $lugar_fin->getId()?>"></input>
    <input type="text" class="input-large" id="autocomplete_lugar_fin" name="autocomplete[lugar_fin]" value="<?php echo $lugar_fin->getNombre()?>" autocomplete="off"></input>
  </div>
  <?php else: ?>
  <div class="input-prepend">
    <span class="add-on">Fin</span>
    <input type="hidden" id="lugar_fin" name="convocatoria[id_lugar_fin]"></input>
    <input type="text" class="input-large" id="autocomplete_lugar_fin" name="autocomplete[lugar_fin]" autocomplete="off"></input>
  </div>
  <?php endif ?>
</div>



<script type="text/javascript">
$("#autocomplete_lugar_ini").autocomplete({
            source: "<?php echo url_for('calendar/autocompleteLugar');?>",
            minLength: 3,
            focus: function( event, ui ) {
                if(ui.item) {
                  //Campo que se enseña al usuario
                  $("#autocomplete_lugar_ini").val(ui.item.label);
                  //Con return false se evita que en el autocomplete se vuelva a poner el value
                  return false;
                }
            },
            select: function( event, ui ) {
                if(ui.item) {
                  //Campo (hidden) que se recogerá por post
                  $("#lugar_ini").val(ui.item.value);
                  //Campo que se enseña al usuario
                  $("#autocomplete_lugar_ini").val(ui.item.label);
                  //Con return false se evita que en el autocomplete se vuelva a poner el value
                  return false;
                } 
            }
        });
        
    $("#autocomplete_lugar_fin").autocomplete({
            source: "<?php echo url_for('calendar/autocompleteLugar');?>",
            minLength: 3,
            focus: function( event, ui ) {
                if(ui.item) {
                  //Campo que se enseña al usuario
                  $("#autocomplete_lugar_fin").val(ui.item.label);
                  //Con return false se evita que en el autocomplete se vuelva a poner el value
                  return false;
                }
            },
            select: function( event, ui ) {
                if(ui.item) {
                  //Campo (hidden) que se recogerá por post
                  $("#lugar_fin").val(ui.item.value);
                  //Campo que se enseña al usuario
                  $("#autocomplete_lugar_fin").val(ui.item.label);
                  //Con return false se evita que en el autocomplete se vuelva a poner el value
                  return false;
                } 
            }
        });
</script>        