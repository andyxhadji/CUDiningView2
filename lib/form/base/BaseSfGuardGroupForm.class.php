<?php

/**
 * SfGuardGroup form base class.
 *
 * @method SfGuardGroup getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSfGuardGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'name'                           => new sfWidgetFormInputText(),
      'description'                    => new sfWidgetFormTextarea(),
      'sf_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SfGuardPermission')),
      'sf_guard_user_group_list'       => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                           => new sfValidatorString(array('max_length' => 255)),
      'description'                    => new sfValidatorString(array('required' => false)),
      'sf_guard_group_permission_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SfGuardPermission', 'required' => false)),
      'sf_guard_user_group_list'       => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SfGuardUser', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SfGuardGroup', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('sf_guard_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardGroup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_guard_group_permission_list']))
    {
      $values = array();
      foreach ($this->object->getSfGuardGroupPermissions() as $obj)
      {
        $values[] = $obj->getPermissionId();
      }

      $this->setDefault('sf_guard_group_permission_list', $values);
    }

    if (isset($this->widgetSchema['sf_guard_user_group_list']))
    {
      $values = array();
      foreach ($this->object->getSfGuardUserGroups() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('sf_guard_user_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSfGuardGroupPermissionList($con);
    $this->saveSfGuardUserGroupList($con);
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
    $c->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->object->getPrimaryKey());
    SfGuardGroupPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_group_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SfGuardGroupPermission();
        $obj->setGroupId($this->object->getPrimaryKey());
        $obj->setPermissionId($value);
        $obj->save($con);
      }
    }
  }

  public function saveSfGuardUserGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_user_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SfGuardUserGroupPeer::GROUP_ID, $this->object->getPrimaryKey());
    SfGuardUserGroupPeer::doDelete($c, $con);

    $values = $this->getValue('sf_guard_user_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SfGuardUserGroup();
        $obj->setGroupId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save($con);
      }
    }
  }

}
