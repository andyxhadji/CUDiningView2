<?php

/**
 * Model generator configuration.
 *
 * @package    sfPropelBootstrapThemePlugin
 * @subpackage generator
 * @author     Luciano Coggiola <tanoinc@gmail.com>
 */
abstract class sfModelBootstrapGeneratorConfiguration extends sfModelGeneratorConfiguration
{

  protected function compile()
  {
    parent::compile();
    $this->configuration = array_merge( $this->configuration, array(
      'template' => array(
          'span' => $this->getTemplatesSpan(),
        )
      ) 
    );
  }

}
