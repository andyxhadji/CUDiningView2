<?php

/**
 * Testdata form base class.
 *
 * @method Testdata getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTestdataForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'HALL'  => new sfWidgetFormInputText(),
      'TTIME' => new sfWidgetFormInputText(),
      'MTYPE' => new sfWidgetFormInputText(),
      'ENTR'  => new sfWidgetFormInputText(),
      'id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'HALL'  => new sfValidatorString(array('max_length' => 30)),
      'TTIME' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'MTYPE' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'ENTR'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('testdata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Testdata';
  }


}
