<?php

class dininghallComponents extends sfComponents
{
  public function executeHeader()
  {
    $this->jayNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByJAY(1)->find();
    $this->jjpNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByJJP(1)->find();
    $this->ferNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByFER(1)->find();    
  }
}
