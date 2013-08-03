<?php

/**
 * Nutrition filter form base class.
 *
 * @package    symfony
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseNutritionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'CURRENT'      => new sfWidgetFormFilterInput(),
      'Dish'         => new sfWidgetFormFilterInput(),
      'JAY'          => new sfWidgetFormFilterInput(),
      'JJP'          => new sfWidgetFormFilterInput(),
      'FER'          => new sfWidgetFormFilterInput(),
      'ServingSize'  => new sfWidgetFormFilterInput(),
      'Calories'     => new sfWidgetFormFilterInput(),
      'TotalFat'     => new sfWidgetFormFilterInput(),
      'Cholesterol'  => new sfWidgetFormFilterInput(),
      'SaturatedFat' => new sfWidgetFormFilterInput(),
      'Protein'      => new sfWidgetFormFilterInput(),
      'Carbohydrate' => new sfWidgetFormFilterInput(),
      'Fiber'        => new sfWidgetFormFilterInput(),
      'Sodium'       => new sfWidgetFormFilterInput(),
      'Score'        => new sfWidgetFormFilterInput(),
      'Url'          => new sfWidgetFormFilterInput(),
      'V'            => new sfWidgetFormFilterInput(),
      'VN'           => new sfWidgetFormFilterInput(),
      'GF'           => new sfWidgetFormFilterInput(),
      'L'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'CURRENT'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Dish'         => new sfValidatorPass(array('required' => false)),
      'JAY'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'JJP'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'FER'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ServingSize'  => new sfValidatorPass(array('required' => false)),
      'Calories'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'TotalFat'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Cholesterol'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'SaturatedFat' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Protein'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Carbohydrate' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Fiber'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Sodium'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Score'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Url'          => new sfValidatorPass(array('required' => false)),
      'V'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'VN'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'GF'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'L'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('nutrition_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Nutrition';
  }

  public function getFields()
  {
    return array(
      'FOOD_ID'      => 'Number',
      'CURRENT'      => 'Number',
      'Dish'         => 'Text',
      'JAY'          => 'Number',
      'JJP'          => 'Number',
      'FER'          => 'Number',
      'ServingSize'  => 'Text',
      'Calories'     => 'Number',
      'TotalFat'     => 'Number',
      'Cholesterol'  => 'Number',
      'SaturatedFat' => 'Number',
      'Protein'      => 'Number',
      'Carbohydrate' => 'Number',
      'Fiber'        => 'Number',
      'Sodium'       => 'Number',
      'Score'        => 'Number',
      'Url'          => 'Text',
      'V'            => 'Number',
      'VN'           => 'Number',
      'GF'           => 'Number',
      'L'            => 'Number',
    );
  }
}
