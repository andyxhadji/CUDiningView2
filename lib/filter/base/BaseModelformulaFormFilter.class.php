<?php

/**
 * Modelformula filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseModelformulaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'JAY' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'FER' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'JJP' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'JAY' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'FER' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'JJP' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('modelformula_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Modelformula';
  }

  public function getFields()
  {
    return array(
      'JAY' => 'Number',
      'FER' => 'Number',
      'JJP' => 'Number',
      'id'  => 'Number',
    );
  }
}
