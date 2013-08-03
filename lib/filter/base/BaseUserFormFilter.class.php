<?php

/**
 * User filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'User'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Name'   => new sfWidgetFormFilterInput(),
      'Gender' => new sfWidgetFormFilterInput(),
      'Food'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'User'   => new sfValidatorPass(array('required' => false)),
      'Name'   => new sfValidatorPass(array('required' => false)),
      'Gender' => new sfValidatorPass(array('required' => false)),
      'Food'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'User'   => 'Text',
      'Name'   => 'Text',
      'Gender' => 'Text',
      'Food'   => 'Text',
      'id'     => 'Number',
    );
  }
}
