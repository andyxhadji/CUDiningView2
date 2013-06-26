[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

  <div class="span<?php echo $this->configuration->getValue('template.span') ?>" id="content">
    <h1>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h1>

    <div class="row-fluid">
      <div class="span12">
        [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
      [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
      </div>
    </div>
  </div>
