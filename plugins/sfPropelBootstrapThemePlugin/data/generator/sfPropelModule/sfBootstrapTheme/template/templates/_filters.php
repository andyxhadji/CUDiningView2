[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

  <div class="btn-group">
    <a href="#filtersBootstrapGeneratorModal" role="button" class="btn" data-toggle="modal"><i class="icon icon-th-list"></i> [?php echo __('Filters') ?]</a>
  </div>

  <!-- Modal -->
  <div class="modal[?php if (!$form->hasGlobalErrors()): ?] hide[?php endif; ?]" id="filtersBootstrapGeneratorModal" tabindex="-1" role="dialog" aria-labelledby="filtersBootstrapGeneratorModalLabel" aria-hidden="true">
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post" class="form-horizontal" style="margin: 0px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="filtersBootstrapGeneratorModalLabel">[?php echo __('Filters') ?]</h3>
      </div>
      <div class="modal-body">

          [?php if ($form->hasGlobalErrors()): ?]
          <div class="alert alert-error">
            [?php echo $form->renderGlobalErrors() ?] <a href="#" class="close" data-dismiss="alert">×</a>
          </div>
          [?php endif; ?]

          [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
          [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
              'name'       => $name,
              'attributes' => $field->getConfig('attributes', array()),
              'label'      => $field->getConfig('label'),
              'help'       => $field->getConfig('help'),
              'form'       => $form,
              'field'      => $field,
              'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
            )) ?]
          [?php endforeach; ?]
      </div>
      <div class="modal-footer">
        [?php echo $form->renderHiddenFields() ?]
        [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn')) ?]
        <input class="btn btn-primary" type="submit" value="[?php echo __('Filter', array(), 'sf_admin') ?]" />
      </div>
    </form>
  </div>
