<?php

/**
 * Modelcounts filter form base class.
 *
 * @package    CUDV
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseModelcountsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'JAY'        => new sfWidgetFormFilterInput(),
      'JJP'        => new sfWidgetFormFilterInput(),
      'FER'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'JAY'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'JJP'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'FER'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('modelcounts_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Modelcounts';
  }

  public function getFields()
  {
    return array(
      'count_time' => 'Date',
      'JAY'        => 'Number',
      'JJP'        => 'Number',
      'FER'        => 'Number',
    );
  }
}
