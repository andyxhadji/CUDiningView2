[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="control-group [?php echo $class ?]">
      [?php echo $form[$name]->renderLabel($label, array('class'=> 'control-label')) ?]
      <div class="controls">

        [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]

        <span class="help-inline" generated="true"> <!--for="pwd"-->
        [?php echo $form[$name]->renderError() ?]
        </span>

        [?php if ($help || $help = $form[$name]->renderHelp()): ?]
          <span class="help-block">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</span>
        [?php endif; ?]
      </div>
  </div>
[?php endif; ?]
