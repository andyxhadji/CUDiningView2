<?php

/**
 * SfGuardGroupPermission form base class.
 *
 * @method SfGuardGroupPermission getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSfGuardGroupPermissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'group_id'      => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'group_id'      => new sfValidatorPropelChoice(array('model' => 'SfGuardGroup', 'column' => 'id', 'required' => false)),
      'permission_id' => new sfValidatorPropelChoice(array('model' => 'SfGuardPermission', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_group_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardGroupPermission';
  }


}
