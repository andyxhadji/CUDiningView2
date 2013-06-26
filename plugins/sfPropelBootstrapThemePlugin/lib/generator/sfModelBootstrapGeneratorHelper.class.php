<?php

/**
 * Model generator helper.
 *
 * @package    symfony
 * @subpackage generator
 * @author     Luciano Coggiola <tanoinc@gmail.com>
 * @version    SVN: $Id: sfModelBootstrapGeneratorHelper.class.php 22914 2009-10-10 12:24:29Z Kris.Wallsmith $
 */
abstract class sfModelBootstrapGeneratorHelper extends sfModelGeneratorHelper
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
  
  public function linkToNew($params)
  {
    $params['icon'] = $this->defaultIcon($params, 'icon-plus');
    $params['only_icon'] = (isset($params['only_icon']) and $params['only_icon'] === true);
    $params['size'] = $this->defaultSize($params);
    $title = __($params['label'], array(), 'sf_admin');
    $label = (!$params['only_icon'] ? ' '. $title : '' );

    return link_to('<i class="'.$params['icon'].' icon-white"></i>'.$label, '@'.$this->getUrlForAction('new'), array('title'=> $title, 'class'=>'btn btn-primary '.$params['size']));
  }

  public function linkToEdit($object, $params)
  {
    $params['icon'] = $this->defaultIcon($params, 'icon-edit');
    $params['only_icon'] = (isset($params['only_icon']) and $params['only_icon'] === true);
    $params['size'] = $this->defaultSize($params, 'btn-small');
    $title = __($params['label'], array(), 'sf_admin');
    $label = (!$params['only_icon'] ? ' '. $title : '' );
    
    return link_to('<i class="'.$params['icon'].'"></i>'.$label, $this->getUrlForAction('edit'), $object, array('title'=> $title, 'class'=>'btn '.$params['size']));
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }
    $params['icon'] = $this->defaultIcon($params, 'icon-trash');
    $params['only_icon'] = (isset($params['only_icon']) and $params['only_icon'] === true);
    $params['size'] = $this->defaultSize($params, 'btn-small');
    $title = __($params['label'], array(), 'sf_admin');
    $label = (!$params['only_icon'] ? ' '. $title : '' );

    return link_to('<i class="'.$params['icon'] . ' icon-white"></i>'.$label, $this->getUrlForAction('delete'), $object, array('title' => $title, 'class' => 'btn btn-danger '.$params['size'], 'method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
  }

  public function linkToList($params)
  {
    $params['icon'] = $this->defaultIcon($params, 'icon-th-list');
    $params['only_icon'] = (isset($params['only_icon']) and $params['only_icon'] === true);
    $params['size'] = $this->defaultSize($params);
    $title = __($params['label'], array(), 'sf_admin');
    $label = (!$params['only_icon'] ? ' '. $title : '' );

    return link_to('<i class="'.$params['icon'].'"></i>'.$label, '@'.$this->getUrlForAction('list'), array('title' => $title, 'class'=>'btn '.$params['size']));
  }

  public function linkToSave($object, $params)
  {
    return '<input class="btn btn-primary" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" />';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<input class="btn" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" />';
  }
}
