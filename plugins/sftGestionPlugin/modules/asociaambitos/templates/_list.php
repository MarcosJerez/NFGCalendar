<?php
/*
* Copyright 2010 Instituto de Tecnologías Educativas - Ministerio de Educación de España
*
* Licencia con arreglo a la EUPL, Versión 1.1 exclusivamente
* (la «Licencia»);
* Solo podrá usarse esta obra si se respeta la Licencia.
* Puede obtenerse una copia de la Licencia en:
*
* http://ec.europa.eu/idabc/eupl5
* 
* y también en:

* http://ec.europa.eu/idabc/en/document/7774.html
*
* Salvo cuando lo exija la legislación aplicable o se acuerde
* por escrito, el programa distribuido con arreglo a la
* Licencia se distribuye «TAL CUAL»,
* SIN GARANTÍAS NI CONDICIONES DE NINGÚN TIPO, ni expresas
* ni implícitas.
* Véase la Licencia en el idioma concreto que rige
* los permisos y limitaciones que establece la Licencia.
*/
?>
<div class="sf_admin_list">
    <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
    <?php else: ?>
    <table cellspacing="0">
        <thead>           
            <tr>
                <th></th>
                    <?php include_partial('asociaambitos/list_th_tabular', array('sort' => $sort)) ?>
                <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="7">
                        <?php if ($pager->haveToPaginate()): ?>
                            <?php include_partial('asociaambitos/pagination', array('pager' => $pager)) ?>
                        <?php endif; ?>

                        <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
                        <?php if ($pager->haveToPaginate()): ?>
                            <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
                        <?php endif; ?>
                </th>
            </tr>
        </tfoot>
        <tbody>
                <?php foreach ($pager->getResults() as $i => $SftAmbito): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
                    <?php $tieneAmbito = $acceso -> tieneAmbito($SftAmbito) ?>
            <tr class="sf_admin_row <?php echo $odd ?>">
                <td>
                            <?php if($tieneAmbito ): ?>
                                <?php echo image_themes_tag('native/images/16x16/link.png', array('alt' => 'asociada')) ?>
                            <?php else : ?>
                                <?php echo image_themes_tag('native/images/16x16/link_break.png', array('alt' => 'no asociada')) ?>
                            <?php endif; ?>
                </td>
               
                <td class="sf_admin_text sf_admin_list_td_nombre">
                            <?php echo $SftAmbito->getNombre() ?>
                </td>
                <td class="sf_admin_text sf_admin_list_td_descripcion">
                            <?php echo $SftAmbito->getDescripcion() ?>
                </td>
                
                 <td class="sf_admin_text sf_admin_list_td_descripcion">
                            <?php echo $SftAmbito->getSftPeriodo() ?>
                </td>
                <td class="sf_admin_text sf_admin_list_td_descripcion">
                            <?php echo $SftAmbito->getEstado() ?>
                </td>
                <td>
                    <ul class="sf_admin_td_actions">

                                <?php if($tieneAmbito): ?>
                        <li class="sf_admin_action_delete">
                                        <?php echo link_to(__('Quitar', array(), 'messages'), 'sft_ambito_asociaambitos_object', array('action'=> 'ListQuitar', 'id'=> $SftAmbito->getId())) ?>
                        </li>
                                <?php else: ?>
                        <li class="sf_admin_action_new">
                                        <?php echo link_to(__('Poner', array(), 'messages'), 'sft_ambito_asociaambitos_object', array('action'=> 'ListPoner', 'id'=> $SftAmbito ->getId())) ?>
                        </li>
                                <?php endif; ?>

                    </ul>
                </td>
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<script type="text/javascript">
    /* <![CDATA[ */
    function checkAll()
    {
        var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
    }
    /* ]]> */
</script>
