<td>
  <div class="btn-group pull-right">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_edit' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php else: ?>
      <?php if (!isset($params['size'])) $params['size'] = 'btn-small'; ?>
      <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
<?php endif; ?>
<?php endforeach; ?>
  </div>
</td>
