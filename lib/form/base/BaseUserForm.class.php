<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'User'   => new sfWidgetFormInputText(),
      'Name'   => new sfWidgetFormInputText(),
      'Gender' => new sfWidgetFormInputText(),
      'Food'   => new sfWidgetFormInputText(),
      'id'     => new sfWidgetFormInputHidden(),
      'Visits' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'User'   => new sfValidatorString(array('max_length' => 50)),
      'Name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'Gender' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'Food'   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'Visits' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
