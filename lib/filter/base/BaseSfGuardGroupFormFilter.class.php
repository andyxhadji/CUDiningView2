<?php

/**
 * SfGuardGroup filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSfGuardGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                    => new sfWidgetFormFilterInput(),
      'sf_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'SfGuardPermission', 'add_empty' => true)),
      'sf_guard_user_group_list'       => new sfWidgetFormPropelChoice(array('model' => 'SfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'description'                    => new sfValidatorPass(array('required' => false)),
      'sf_guard_group_permission_list' => new sfValidatorPropelChoice(array('model' => 'SfGuardPermission', 'required' => false)),
      'sf_guard_user_group_list'       => new sfValidatorPropelChoice(array('model' => 'SfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_group_filters[%s]');

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

    $criteria->addJoin(SfGuardGroupPermissionPeer::GROUP_ID, SfGuardGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SfGuardGroupPermissionPeer::PERMISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SfGuardGroupPermissionPeer::PERMISSION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addSfGuardUserGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SfGuardUserGroupPeer::GROUP_ID, SfGuardGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SfGuardUserGroupPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SfGuardUserGroupPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SfGuardGroup';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'description'                    => 'Text',
      'sf_guard_group_permission_list' => 'ManyKey',
      'sf_guard_user_group_list'       => 'ManyKey',
    );
  }
}
