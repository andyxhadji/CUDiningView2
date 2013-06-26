[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

  <div class="span<?php echo $this->configuration->getValue('template.span') ?>" id="content">
    <h1>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

    [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

    <div class="row-fluid">
      <div class="span12">

        <?php if ($this->configuration->hasFilterForm()): ?>
        <div class="row-fluid">
          <div class="span12">
            <div class="btn-toolbar">
              [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
              [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="row-fluid">
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
        </div>

        <div class="row-fluid">
          <div class="span12">
          <?php if ($this->configuration->getValue('list.batch_actions')): ?>
              <form class="form-inline" action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
          <?php endif; ?>
              [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
              <!--div class="form-actions"-->
                <div class="btn-toolbar">
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
                [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
                </div>
              <!--/div-->
          <?php if ($this->configuration->getValue('list.batch_actions')): ?>
              </form>
          <?php endif; ?>
          </div>
        </div>

        <div class="row-fluid">
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
        </div>


      </div> <!-- <div class="span12"> -->
    </div> <!-- <div class="row-fluid"> -->
  </div> <!-- <div id="content"> -->
