<?php

/**
 * SfGuardPermission form base class.
 *
 * @method SfGuardPermission getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSfGuardPermissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'name'                           => new sfWidgetFormInputText(),
      'description'                    => new sfWidgetFormTextarea(),
      'sf_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SfGuardGroup')),
      'sf_guard_user_permission_list'  => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                           => new sfValidatorString(array('max_length' => 255)),
      'description'                    => new sfValidatorString(array('required' => false)),
      'sf_guard_group_permission_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SfGuardGroup', 'required' => false)),
      'sf_guard_user_permission_list'  => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SfGuardUser', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SfGuardPermission', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('sf_guard_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardPermission';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_guard_group_permission_list']))
    {
      $values = array();
      foreach ($this->object->getSfGuardGroupPermissions() as $obj)
      {
        $values[] = $obj->getGroupId();
      }

      $this->setDefault('sf_guard_group_permission_list', $values);
    }

    if (isset($this->widgetSchema['sf_guard_user_permission_list']))
    {
      $values = array();
      foreach ($this->object->getSfGuardUserPermissions() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('sf_guard_user_permission_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSfGuardGroupPermissionList($con);
    $this->saveSfGuardUserPermissionList($con);
  }

  public function saveSfGuardGroupPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_group_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SfGuardGroupPermissionPeer::PERMISSION_ID, $this->object->getPrimaryKey());
    SfGuardGroupPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_group_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SfGuardGroupPermission();
        $obj->setPermissionId($this->object->getPrimaryKey());
        $obj->setGroupId($value);
        $obj->save($con);
      }
    }
  }

  public function saveSfGuardUserPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_user_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SfGuardUserPermissionPeer::PERMISSION_ID, $this->object->getPrimaryKey());
    SfGuardUserPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_user_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SfGuardUserPermission();
        $obj->setPermissionId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
