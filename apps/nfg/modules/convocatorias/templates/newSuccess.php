<?php use_helper('I18N', 'Date') ?>
<?php include_partial('convocatorias/assets') ?>
<?php use_themes_javascript('jquery/js/jquery-1.6.2.min.js') ?>
<?php use_javascript('../themesPlugin/themes/default/jquery/js/jquery-ui-1.8.16.custom.min.js') ?>
<?php use_themes_javascript('colorbox/js/jquery.colorbox.js') ?>
<?php use_themes_stylesheet('colorbox/css/colorbox.css') ?>
<script>
    //Tiene que estar en la plantilla a utilizar IMPORTANTE!!!!
    $(document).ready(function(){
        $(".darDeAlta").colorbox({iframe:true, width:900,height:400});
    });
</script>

<div id="sf_admin_container">
    <h1><?php echo __('Nueva convocatoria', array(), 'messages') ?></h1>

    <?php include_partial('convocatorias/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('convocatorias/form_header', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <div id="form_nuevo" class="sf_admin_form">
            
          <form method="post" action="<?php echo url_for('@nfg_convocatoria');?>">
            <?php echo $form->renderHiddenFields(false) ?>

            <?php if ($form->hasGlobalErrors()): ?>
              <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>

            <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>

                <fieldset id="sf_fieldset" style="width: 550px;">
                    <?php $class='sf_admin_form_row';?>
                  
                    <div class="<?php echo $class ?><?php $form['id_actividad']->hasError() and print ' errors' ?>">
                      <?php echo $form['id_actividad']->renderError() ?>
                      <div>
                        <?php echo $form['id_actividad']->renderLabel("¿Qué?") ?>
                        <div class="content"><?php echo $form['id_actividad']->render() ?></div>
                      </div>
                      <div id="alta_actividad" style="display:none; color:red"><?php echo link_to("Dar de alta",'actividades/new',array('class'=>'darDeAlta', 'id'=>'darDeAlta'))?></div>
                    </div>

                    <div class="<?php echo $class ?><?php $form['id_lugar_ini']->hasError() and print ' errors' ?>">
                      <?php echo $form['id_lugar_ini']->renderError() ?>
                      <div>
                        <?php echo $form['id_lugar_ini']->renderLabel("¿Dónde?") ?>
                        <div class="content"><?php echo $form['id_lugar_ini']->render() ?></div>
                      </div>
                      <div id="alta_lugar_ini" style="display:none; color:red"><?php echo link_to("Dar de alta",'lugares/new',array('class'=>'darDeAlta'))?></div>
                    </div>
     

                    <div class="<?php echo $class ?><?php $form['fecha_ini']->hasError() and print ' errors' ?>">
                      <?php echo $form['fecha_ini']->renderError() ?>
                      <div>
                        <?php echo $form['fecha_ini']->renderLabel("¿Cuándo?") ?>
                        <div class="content">
                            <span><?php echo __('El') ?> </span><span><?php echo $form['fecha_ini']->render() ?></span>
                            <span> <?php echo __('a las') ?> </span><span><?php echo $form['hora_ini']->render() ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="<?php echo $class ?><?php $form['fecha_fin']->hasError() and print ' errors' ?>">
                      <?php echo $form['fecha_fin']->renderError() ?>
                      <div>
                        <div class="content">
                            <span><?php echo __('hasta el') ?> </span><span><?php echo $form['fecha_fin']->render() ?></span>
                            <span> <?php echo __('a las') ?> </span><span><?php echo $form['hora_fin']->render() ?></span>
                        </div>
                      </div>
                    </div>
                               

                    <div class="<?php echo $class ?><?php $form['notas']->hasError() and print ' errors' ?>">
                      <?php echo $form['notas']->renderError() ?>
                      <div>
                        <?php echo $form['notas']->renderLabel("¿Algo más?") ?>
                        <div class="content"><?php echo $form['notas']->render() ?></div>
                      </div>
                    </div>
                  
               </fieldset>

               <fieldset id="sf_fieldset" style="width: 550px;">
                    <?php echo $form['participantes_min']->renderLabel("¿Cuántos?") ?>
                    <div class="<?php echo $class ?><?php $form['participantes_min']->hasError() and print ' errors' ?>">
                      <?php echo $form['participantes_min']->renderError() ?>
                      <div>
                        <?php echo __('De') ?>
                          <span class="content"><?php echo $form['participantes_min']->render(array('size' => 2, 'maxlength' => 2)) ?></span>
                        <?php echo __('a') ?>  
                          <span class="content"><?php echo $form['participantes_max']->render(array('size' => 2, 'maxlength' => 2)) ?></span>

                          <div class="help"><?php echo __('Deja la primera casilla en blanco si no se requiere un número mínimo de participantes', array(), 'messages') ?></div>
                          <div class="help"><?php echo __('Deja la segunda casilla en blanco si no se requiere un número mínimo de participantes', array(), 'messages') ?></div>
                      </div>
                    </div>

               </fieldset>
            
               <fieldset id="sf_fieldset" style="width: 550px;">
            
                 <div class="<?php echo $class ?><?php $form['privada']->hasError() and print ' errors' ?>">
                   <?php echo $form['privada']->renderError() ?>
                   <div>
                     <?php echo $form['privada']->renderLabel('Privada') ?>
                     <div class="content"><?php echo $form['privada']->render() ?></div>
                     <div class="help"><?php echo __("si marcas la convocatoria como privada, solamente podrán verla aquellas personas a las que tú invites", array(), 'messages') ?></div>
                   </div>
                 </div>
                 
               </fieldset>

            <?php endforeach; ?>

            <?php include_partial('convocatorias/form_actions', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
          </form>
        </div>
      </div>

    <div id="sf_admin_footer">
      <?php include_partial('convocatorias/form_footer', array('NfgConvocatoria' => $NfgConvocatoria, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>