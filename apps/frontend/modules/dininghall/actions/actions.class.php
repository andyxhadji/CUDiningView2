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

    if (!$_SESSION['facebook'])
    {
      $_SESSION['facebook'] = new Facebook(array(
        'appId'  => '456852741047731',
        'secret' => 'd393063ed740476afcaf29c30eee14b8',
      ));
    }
    if ($_SESSION['facebook']->getUser())
    {
      $me = $_SESSION['facebook']->api('/me');
      $userId = $_SESSION['facebook']->getUser();
      if (!UserQuery::create()->filterByUserId($userId)->count())
      {
        $user = new User();
        $user->setUserId($userId);
        $user->setName($me['name']);
        $user->setGender($me['gender']);
        $user->save();
      }
    }
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
