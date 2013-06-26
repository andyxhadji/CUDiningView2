<?php

/**
 * Nutrition form base class.
 *
 * @method Nutrition getObject() Returns the current form's model object
 *
 * @package    CUDV
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseNutritionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'FOOD_ID'      => new sfWidgetFormInputHidden(),
      'CURRENT'      => new sfWidgetFormInputText(),
      'Dish'         => new sfWidgetFormInputText(),
      'JAY'          => new sfWidgetFormInputText(),
      'JJP'          => new sfWidgetFormInputText(),
      'FER'          => new sfWidgetFormInputText(),
      'ServingSize'  => new sfWidgetFormInputText(),
      'Calories'     => new sfWidgetFormInputText(),
      'TotalFat'     => new sfWidgetFormInputText(),
      'Cholesterol'  => new sfWidgetFormInputText(),
      'SaturatedFat' => new sfWidgetFormInputText(),
      'Protein'      => new sfWidgetFormInputText(),
      'Carbohydrate' => new sfWidgetFormInputText(),
      'Fiber'        => new sfWidgetFormInputText(),
      'Sodium'       => new sfWidgetFormInputText(),
      'Score'        => new sfWidgetFormInputText(),
      'Url'          => new sfWidgetFormInputText(),
      'V'            => new sfWidgetFormInputText(),
      'VN'           => new sfWidgetFormInputText(),
      'GF'           => new sfWidgetFormInputText(),
      'L'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'FOOD_ID'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getFoodId()), 'empty_value' => $this->getObject()->getFoodId(), 'required' => false)),
      'CURRENT'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Dish'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'JAY'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'JJP'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'FER'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ServingSize'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'Calories'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'TotalFat'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Cholesterol'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'SaturatedFat' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Protein'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Carbohydrate' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Fiber'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Sodium'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Score'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'Url'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'V'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'VN'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'GF'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'L'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nutrition[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Nutrition';
  }


}
