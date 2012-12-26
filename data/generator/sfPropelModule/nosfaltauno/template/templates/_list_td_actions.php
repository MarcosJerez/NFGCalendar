<td>
  <ul class="sf_admin_td_actions">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_edit' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>
    <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
 <?php //controlador de parametros generate-admin?>
        <?php isset($params["action"])?$action=$params["action"]:$action=$name ?>
        <?php isset($params["label"])?$label=$params["label"]:$label=$name ?>
        <?php isset($params["icon"])?$icon=$params["icon"]:$icon=$name ?>
        <?php isset($params["module"])?$module=$params["module"]:$module=$this->getModuleName() ?>
      <?php echo $this->addCredentialCondition('[?php echo link_to(image_tag("../css/CSS_2/'.$icon.'",array("title"=> __("'.$label.'"))), url_for("'.$module.'/'.$action.'?id=".$'.$this->getSingularName().'->getId())) ?]', $params) ?>
         <?php //echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
    </li>
<?php endif; ?>
<?php endforeach; ?>
  </ul>
</td>
