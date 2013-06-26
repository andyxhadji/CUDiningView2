<?php
/**
 * Propel Bootstrap generator.
 *
 * @package    sfPropelBootstrapThemePlugin
 * @subpackage generator
 * @author     Luciano Coggiola <tanoinc@gmail.com>
 */
class sfPropelBoostrapGenerator extends sfPropelGenerator
{

  private $button_sizes = array('btn-mini', 'btn-small', 'btn-large');

  private function defaultIcon($params, $icon = 'icon-list')
  {
    if (empty($params['icon']))
    {
      return $icon;
    }
    return $params['icon'];
  }

  private function defaultSize($params, $default = '')
  {
    if (empty($params['size']))
    {
      return $default;
    }
    else
    {
      return (in_array($params['size'], $this->button_sizes) ? $params['size'] : $default );
    }
  }

  /**
   * Returns HTML code for an action link.
   *
   * @param string  $actionName The action name
   * @param array   $params     The parameters
   * @param boolean $pk_link    Whether to add a primary key link or not
   *
   * @return string HTML code
   */
  public function getLinkToAction($actionName, $params, $pk_link = false)
  {
    $action = isset($params['action']) ? $params['action'] : 'List'.sfInflector::camelize($actionName);

    $url_params = $pk_link ? '?'.$this->getPrimaryKeyUrlParams() : '\'';

    $params['icon'] = (isset($params['icon'])? $params['icon'] : 'icon-th-list');
    $params['params']['class'] = (isset($params['params']['class'])? $params['params']['class'] : 'btn');
    $params['only_icon'] = (isset($params['only_icon']) ? $params['only_icon'] : true);
    $params['size'] = $this->defaultSize($params);
    $params['params']['class'] .= ' '.$params['size'];
    $title = '__(\''.$params['label'].'\', array(), \''.$this->getI18nCatalogue().'\')';
    $label = (!$params['only_icon'] ? ' \'.'. $title : '\'' );


    return '[?php echo link_to(\'<i class="'.$params['icon'].'"></i>'.$label.', \''.$this->getModuleName().'/'.$action.$url_params.', '.$this->asPhp($params['params']).') ?]';
  }

}
