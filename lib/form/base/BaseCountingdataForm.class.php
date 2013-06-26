<?php

/**
 * Countingdata form base class.
 *
 * @method Countingdata getObject() Returns the current form's model object
 *
 * @package    CUDV
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCountingdataForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'HALL'      => new sfWidgetFormInputText(),
      'OCCUPANCY' => new sfWidgetFormInputText(),
      'id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'HALL'      => new sfValidatorString(array('max_length' => 3)),
      'OCCUPANCY' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('countingdata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Countingdata';
  }


}
