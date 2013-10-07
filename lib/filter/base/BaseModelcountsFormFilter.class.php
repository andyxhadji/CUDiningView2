<?php

/**
 * Modelcounts filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseModelcountsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'JAY'        => new sfWidgetFormFilterInput(),
      'JJP'        => new sfWidgetFormFilterInput(),
      'FER'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'created_at' => 'Date',
      'count_time' => 'Date',
      'JAY'        => 'Number',
      'JJP'        => 'Number',
      'FER'        => 'Number',
    );
  }
}
