<?php

/**
 * SfGuardPermission filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSfGuardPermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                    => new sfWidgetFormFilterInput(),
      'sf_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'SfGuardGroup', 'add_empty' => true)),
      'sf_guard_user_permission_list'  => new sfWidgetFormPropelChoice(array('model' => 'SfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'description'                    => new sfValidatorPass(array('required' => false)),
      'sf_guard_group_permission_list' => new sfValidatorPropelChoice(array('model' => 'SfGuardGroup', 'required' => false)),
      'sf_guard_user_permission_list'  => new sfValidatorPropelChoice(array('model' => 'SfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addSfGuardGroupPermissionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SfGuardGroupPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SfGuardGroupPermissionPeer::GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SfGuardGroupPermissionPeer::GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addSfGuardUserPermissionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SfGuardUserPermissionPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SfGuardUserPermissionPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SfGuardPermission';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'description'                    => 'Text',
      'sf_guard_group_permission_list' => 'ManyKey',
      'sf_guard_user_permission_list'  => 'ManyKey',
    );
  }
}
