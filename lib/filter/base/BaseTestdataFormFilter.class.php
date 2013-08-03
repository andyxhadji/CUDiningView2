<?php

/**
 * Testdata filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTestdataFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'HALL'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'TTIME' => new sfWidgetFormFilterInput(),
      'MTYPE' => new sfWidgetFormFilterInput(),
      'ENTR'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'HALL'  => new sfValidatorPass(array('required' => false)),
      'TTIME' => new sfValidatorPass(array('required' => false)),
      'MTYPE' => new sfValidatorPass(array('required' => false)),
      'ENTR'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('testdata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Testdata';
  }

  public function getFields()
  {
    return array(
      'HALL'  => 'Text',
      'TTIME' => 'Text',
      'MTYPE' => 'Text',
      'ENTR'  => 'Number',
      'id'    => 'Number',
    );
  }
}
