<?php use_helper('I18N', 'Date') ?>
<?php include_partial('convocatorias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editar Convocatoria del dia:   %%fecha_ini%%', array('%%fecha_ini%%' => false !== strtotime($NfgConvocatoria->getFechaIni()) ? format_date($NfgConvocatoria->getFechaconvocatoria(), "f") : '&nbsp;'), 'messages') ?></h1>

  <?php include_partial('convocatorias/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('convocatorias/form_header', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <div id="form_editar" class="sf_admin_form" style="width:760px;">
	  <?php echo form_tag_for($form, '@nfg_convocatoria') ?>
		<?php echo $form->renderHiddenFields(false) ?>

		<?php if ($form->hasGlobalErrors()): ?>
		  <?php echo $form->renderGlobalErrors() ?>
		<?php endif; ?>

		<?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>

			<div style="color:blue; font-size:20px;"><?php echo $NfgConvocatoria->getNfgActividad()->getNombre();?></div>
			
			<fieldset id="sf_fieldset_izq" style="float:left; width:380px;">
			  
			  <?php $field = $fields['id_lugar_ini'];
			  $name = 'id_lugar_ini';
				  $attributes = $field->getConfig('attributes', array());
				  $label = $field->getConfig('label');
				  $help = $field->getConfig('help');
				  $form = $form;
				  $field = $field;
				  $class = 'sf_admin_form_row sf_admin_text sf_admin_form_field_lugar';
				?>
			  
			  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
				<?php echo $form[$name]->renderError() ?>
				<div>
				  <?php echo $form[$name]->renderLabel($label) ?>

				  <div class="content"><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></div>

				  <?php if ($help): ?>
					<div class="help"><?php echo __($help, array(), 'messages') ?></div>
				  <?php elseif ($help = $form[$name]->renderHelp()): ?>
					<div class="help"><?php echo $help ?></div>
				  <?php endif; ?>
				</div>
			  </div>
			  
			  <?php $field = $fields['fecha_ini'];
			  $name = 'fecha_ini';
				  $attributes = $field->getConfig('attributes', array());
				  $label = $field->getConfig('label');
				  $help = $field->getConfig('help');
				  $form = $form;
				  $field = $field;
				  $class = 'sf_admin_form_row sf_admin_date sf_admin_form_field_fecha'
				?>
			  
			  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
				<?php echo $form[$name]->renderError() ?>
				<div>
				  <?php echo $form[$name]->renderLabel($label) ?>

				  <div class="content">
					  <div>
					    <span>El </span><span><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></span>
					  </div>
					  <div>
					    <span> de </span><span><?php echo $form['hora_ini']->render() ?></span>
					    <span> a </span><span><?php echo $form['hora_fin']->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></span>
					  </div>	
				  </div>
				  
				  <?php if ($help): ?>
					<div class="help"><?php echo __($help, array(), 'messages') ?></div>
				  <?php elseif ($help = $form[$name]->renderHelp()): ?>
					<div class="help"><?php echo $help ?></div>
				  <?php endif; ?>
				</div>
			  </div>
			  
			  <?php $field = $fields['notas'];
			  $name = 'notas';
				  $attributes = $field->getConfig('attributes', array());
				  $label = $field->getConfig('label');
				  $help = $field->getConfig('help');
				  $form = $form;
				  $field = $field;
				  $class = 'sf_admin_form_row sf_admin_textarea sf_admin_form_field_notas';
				?>
			  
			  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
				<?php echo $form[$name]->renderError() ?>
				<div>
				  <?php echo $form[$name]->renderLabel($label) ?>

				  <div class="content"><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></div>

				  <?php if ($help): ?>
					<div class="help"><?php echo __($help, array(), 'messages') ?></div>
				  <?php elseif ($help = $form[$name]->renderHelp()): ?>
					<div class="help"><?php echo $help ?></div>
				  <?php endif; ?>
				</div>
			  </div>
			  
			</fieldset>

                        </form>
			  
          <?php include_component('convocatorias','compApuntados',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			                
          <?php include_component('convocatorias','compInvitados',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			 
                        
			                    <div class="sf_admin_form_input sf_admin_input sf_admin_form_field_input_apuntados">
                              <form id="invitado" method="post" action="<?php echo url_for('convocatorias/apuntar');?>">
                                <?php echo $nombre_invitado->getRawValue()->render('nombre_invitado');?>
                                <input type="hidden" name="id_convocatoria" value="<?php echo $NfgConvocatoria->getId();?>"/>
                                <input type="submit" value="Invitar"/> 
                              </form>
                          </div>
			  
                
        <?php include_component('convocatorias','compFaltan',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			  
        
        <?php $field = $fields['privada'];
			  $name = 'privada';
				  $attributes = $field->getConfig('attributes', array());
				  $label = $field->getConfig('label');
				  $help = $field->getConfig('help');
				  $form = $form;
				  $field = $field;
				  $class = 'sf_admin_form_row sf_admin_textarea sf_admin_form_field_privada';
				?>

			  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
				<?php echo $form[$name]->renderError() ?>
				<div>
				  <?php echo $form[$name]->renderLabel($label) ?>

				  <div class="content"><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></div>

				  <?php if ($help): ?>
					<div class="help"><?php echo __($help, array(), 'messages') ?></div>
				  <?php elseif ($help = $form[$name]->renderHelp()): ?>
					<div class="help"><?php echo $help ?></div>
				  <?php endif; ?>
				</div>
			  </div>
			</fieldset>  
			
			<fieldset>
			  <?php include_partial('redessociales',array('NfgConvocatoria'=>$NfgConvocatoria));?>
			</fieldset>
		
			
		  
		<?php endforeach; ?>

		<?php include_partial('convocatorias/form_actions', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

                <div>
                  <?php include_component('comentarios','nuevo',array('idconvocatoria'=>$NfgConvocatoria->getId()));?>
                  <?php include_component('comentarios','muro',array('idconvocatoria'=>$NfgConvocatoria->getId()));?>
                </div>
	</div>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('convocatorias/form_footer', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
