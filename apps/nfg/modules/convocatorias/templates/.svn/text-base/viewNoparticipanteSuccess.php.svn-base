<?php use_helper('I18N', 'Date') ?>
<?php include_partial('convocatorias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Convocatorias', array(), 'messages') ?></h1>

  <?php include_partial('convocatorias/flashes') ?>

  <div id="sf_admin_content">
    <div id="form_desapuntarse" class="sf_admin_form" style="width:760px;">
	   <form method="post" action="<?php echo url_for('convocatorias/apuntarse'); ?>">
		<input type="hidden" name="id_convocatoria" value="<?php echo $NfgConvocatoria->getId();?>" id="id_convocatoria">

			<div style="color:blue; font-size:20px;"><?php echo $NfgConvocatoria->getNfgActividad()->getNombre();?></div>
			
			<fieldset id="sf_fieldset_izq" style="float:left; width:380px;">
			  
			  	<div>
				  <?php echo __('¿Dónde?'); ?>
				  <div class="content">
                                      <span><?php echo $NfgConvocatoria->getNfgLugarRelatedByIdLugarIni()->getNombre();?></span>
                                       -
                                      <span><?php echo $NfgConvocatoria->getNfgLugarRelatedByIdLugarIni()->getNfgLocalidad()->getNombre(); ?></span>
                                      <span><a href="#">Ver mapa</a></span>
                                  </div>
				  
				  <?php echo __('¿Cuándo?'); ?>
				  <div class="content"><?php echo $NfgConvocatoria->getFechaIni(); ?></div>			  
				</div>
			  
			</fieldset>
			  
			  <?php include_component('convocatorias','compApuntados',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			                
        <?php include_component('convocatorias','compInvitados',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			 
			  <div class="">
				<div>
				  <span>Todav&iacute;a faltan entre:</span> 
				  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMinActualizado(); ?></span>
				  y
				  <span class="content" style="color:red; font-size:60px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMaxActualizado(); ?></span>
				</div>
			  </div>

			<fieldset id="sf_fieldset_der" style="float:left; width:350px;">
			  

			</fieldset>  
			
			<fieldset>
			  <?php include_partial('redessociales',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			</fieldset>
		
			<input type="submit" value="Me apunto!!! :)"/>
			
			
		</form>  
	</div>
  </div>

  
</div>
