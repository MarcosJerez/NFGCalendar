<?php use_helper('I18N', 'Date') ?>
<?php include_partial('convocatorias/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('Mis Convocatorias', array(), 'messages') ?></h1>

    <?php include_partial('convocatorias/flashes') ?>

    <div id="sf_admin_content">
      <table cellspacing="0">
        <tbody>
          <?php $i=0; foreach($convocatoriasUsuario as $convocatoria): $odd = fmod(++$i, 2) ? 'odd' : 'even'?>
          <tr class="sf_admin_row <?php echo $odd;?>">
            <td class="sf_admin_text sf_admin_list_td_fechaConvocatoria">
              <?php echo $convocatoria->getFechaConvocatoria();?></a>
            </td>
            <td class="sf_admin_text sf_admin_list_td_NfgActividad">
              <a href="<?php echo url_for('convocatorias/edit?id='.$convocatoria->getId()); ?>"><?php echo $convocatoria->getNfgActividad();?></a>
            </td>
            <td class="sf_admin_text sf_admin_list_td_faltan">
              <?php echo $convocatoria->getTextoFaltan();?></a>
            </td>
          </tr>
          <?php endforeach; ?>
        
        </tbody>
      </table>
      
    </div>
</div>

<div id="sf_admin_container">
    <h1><?php echo __('Sugerencias', array(), 'messages') ?></h1>

    <?php include_partial('convocatorias/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('convocatorias/list_header', array('pager' => $pagerSugerencias)) ?>
    </div>


    <div id="sf_admin_content">
        <form action="<?php echo url_for('nfg_convocatoria_collection', array('action' => 'batch')) ?>" method="post">
            <?php include_partial('convocatorias/list', array('pager' => $pagerSugerencias, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('convocatorias/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('convocatorias/list_actions', array('helper' => $helper)) ?>
            </ul>
        </form>
    </div>
</div>
