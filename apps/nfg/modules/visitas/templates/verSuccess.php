<?php use_helper('I18N', 'Date') ?>
<?php include_partial('convocatorias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editar Convocatoria del dia:   %%fecha_ini%%', array('%%fecha_ini%%' => false !== strtotime($NfgConvocatoria->getFechaIni()) ? format_date($NfgConvocatoria->getFechaconvocatoria(), "f") : '&nbsp;'), 'messages') ?></h1>

  <?php include_partial('convocatorias/flashes') ?>

  <div id="sf_admin_header">
  
  </div>

  <div id="sf_admin_content">
    <div id="form_editar" class="sf_admin_form" style="width:760px;">

			<div style="color:blue; font-size:20px;"><?php echo $NfgConvocatoria->getNfgActividad()->getNombre();?></div>
			
			<fieldset id="sf_fieldset_izq" style="float:left; width:380px;">
			  
			  <?php $class = 'sf_admin_form_row sf_admin_text sf_admin_form_field_lugar';?>
			  
			  <div class="<?php echo $class ?>">
				<div>
				  <?php echo __('¿ Dónde ?')?>
                                    <div class="content"><?php echo $NfgConvocatoria->getNfgLugarRelatedByIdLugarIni() ?></div>
				</div>
			  </div>
			  
			  <?php $class = 'sf_admin_form_row sf_admin_date sf_admin_form_field_fecha';?>
			  
			  <div class="<?php echo $class ?>">
				<div>
				  <?php echo __('¿ Cuándo ?'); ?>
				  <div class="content">
					  <div>
                                              <span>El </span><span><?php echo $NfgConvocatoria->getFechaIni()?></span>
					  </div>
					  <div>
                                              <span> de </span><span><?php echo $NfgConvocatoria->getHoraIni() ?></span>
                                              <span> a </span><span><?php echo $NfgConvocatoria->getHoraFin()?></span>
					  </div>	
				  </div>
				</div>
			  </div>
			  
			  <?php $class = 'sf_admin_form_row sf_admin_textarea sf_admin_form_field_notas';?>
			  
			  <div class="<?php echo $class ?>">
				<div>
				  <?php echo __('Notas'); ?>

                                    <div class="content"><?php echo $NfgConvocatoria->getNotas()?></div>
				</div>
			  </div>
			</fieldset>

			<fieldset id="sf_fieldset_der" style="float:left; width:350px;">
			  
			  <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_faltan">
				<div>
				  Faltaban entre 
                                  <span class="content"><?php echo $NfgConvocatoria->getParticipantesMin()?></span>
				  y
                                  <span class="content"><?php echo $NfgConvocatoria->getParticipantesMax()?></span>
				  personas.      
				</div>
			  </div>
			  <div class="sf_admin_form_row sf_admin_li sf_admin_form_field_apuntados">
				<div>
				  <div>Se han apuntado:</div>
					<?php foreach($NfgConvocatoria->getNfgParticipantes() as $NfgParticipante): ?>
                                            <li><?php echo $NfgParticipante->getNfgUsuario();?></li>
					<?php endforeach ?>
                                        <?php foreach($NfgApuntado as $oApuntado): ?>
                                            <li><?php echo $oApuntado->getApuntado();?></li>
					<?php endforeach ?>
				</div>
			  </div>
			  <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_aunfaltan">
				<div>
				  <span>Todav&iacute;a faltan entre:</span> 
                                  <span class="content" style="color:red; font-size:80px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMinActualizado() ?></span>
				  y
                                  <span class="content" style="color:red; font-size:60px; margin:0px; padding:0px;"><?php echo $NfgConvocatoria->getFaltanMaxActualizado()?></span>
				</div>
			  </div>
                          <div>
                            <a><?php echo link_to('Regístrate',  url_for(''))?></a>
                          </div>
			</fieldset>  
	</div>
  </div>

  <div id="sf_admin_footer">
  </div>
</div>
