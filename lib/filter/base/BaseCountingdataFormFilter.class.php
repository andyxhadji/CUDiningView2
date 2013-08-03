<?php

/**
 * Countingdata filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCountingdataFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'HALL'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'OCCUPANCY' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'HALL'      => new sfValidatorPass(array('required' => false)),
      'OCCUPANCY' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('countingdata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Countingdata';
  }

  public function getFields()
  {
    return array(
      'HALL'      => 'Text',
      'OCCUPANCY' => 'Number',
      'id'        => 'Number',
    );
  }
}
