<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_aunfaltan">
  
<?php if($tipoFaltan == 1):?>
  <span>Todav&iacute;a faltan</span>
  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMinActualizado() ?></span>
<?php elseif($tipoFaltan == 2):?>
  <span>Todav&iacute;a faltan entre</span>
  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMinActualizado() ?></span>
y
  <span class="content" style="color:red; font-size:60px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMaxActualizado()?></span>
<?php elseif($tipoFaltan == 3):?>
  <span>Todav&iacute;a faltan</span>
  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMinActualizado() ?></span>
<?php elseif($tipoFaltan == 4):?>
  <span>Faltan</span>
  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMaxActualizado() ?></span>
para completar el cupo
<?php else:?>
  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;">?</span>
<?php endif; ?>



</div>
