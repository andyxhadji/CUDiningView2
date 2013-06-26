<?php

/**
 * dininghall actions.
 *
 * @package    CUDV
 * @subpackage dininghall
 * @author     Your name here
 */
class dininghallActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->jayNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByJAY(1)->find();
    $this->jjpNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByJJP(1)->find();
    $this->ferNutrition = nutritionQuery::create()->filterByCURRENT(1)->filterByFER(1)->find();
  */
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new nutritionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new nutritionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $nutrition = nutritionQuery::create()->findPk($request->getParameter('food_id'));
    $this->forward404Unless($nutrition, sprintf('Object nutrition does not exist (%s).', $request->getParameter('food_id')));
    $this->form = new nutritionForm($nutrition);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $nutrition = nutritionQuery::create()->findPk($request->getParameter('food_id'));
    $this->forward404Unless($nutrition, sprintf('Object nutrition does not exist (%s).', $request->getParameter('food_id')));
    $this->form = new nutritionForm($nutrition);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $nutrition = nutritionQuery::create()->findPk($request->getParameter('food_id'));
    $this->forward404Unless($nutrition, sprintf('Object nutrition does not exist (%s).', $request->getParameter('food_id')));
    $nutrition->delete();

    $this->redirect('dininghall/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $nutrition = $form->save();

      $this->redirect('dininghall/edit?food_id='.$nutrition->getFoodId());
    }
  }
}
