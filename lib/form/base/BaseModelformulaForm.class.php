<?php

/**
 * Modelformula form base class.
 *
 * @method Modelformula getObject() Returns the current form's model object
 *
 * @package    symfony
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseModelformulaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'JAY' => new sfWidgetFormInputText(),
      'FER' => new sfWidgetFormInputText(),
      'JJP' => new sfWidgetFormInputText(),
      'id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'JAY' => new sfValidatorNumber(),
      'FER' => new sfValidatorNumber(),
      'JJP' => new sfValidatorNumber(),
      'id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('modelformula[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Modelformula';
  }


}
