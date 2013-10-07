<?php

/**
 * SfGuardGroupPermission filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSfGuardGroupPermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sf_guard_group_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardGroupPermission';
  }

  public function getFields()
  {
    return array(
      'group_id'      => 'ForeignKey',
      'permission_id' => 'ForeignKey',
    );
  }
}
