<?php

/**
 * Modelcounts form base class.
 *
 * @method Modelcounts getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseModelcountsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at' => new sfWidgetFormDateTime(),
      'count_time' => new sfWidgetFormInputHidden(),
      'JAY'        => new sfWidgetFormInputText(),
      'JJP'        => new sfWidgetFormInputText(),
      'FER'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'created_at' => new sfValidatorDateTime(),
      'count_time' => new sfValidatorChoice(array('choices' => array($this->getObject()->getCountTime()), 'empty_value' => $this->getObject()->getCountTime(), 'required' => false)),
      'JAY'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'JJP'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'FER'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('modelcounts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Modelcounts';
  }


}
