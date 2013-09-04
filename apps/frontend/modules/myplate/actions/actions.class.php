<?php

/**
 * myplate actions.
 *
 * @package    symfony
 * @subpackage myplate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myplateActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$arr = $_SESSION['facebook']->getSignedRequest();
  	$userId = $arr['user_id'];
  	$user = UserQuery::create()->filterByUserId($userId)->findOne();
  	if  ($user):
  		$_SESSION['foods'] = unserialize($user->getFood());
  		$_SESSION['myplate'] = array();
  		$_SESSION['myfoodnow'] = array();
  		foreach ($_SESSION['foods'] as $food)
  		{
  			$plate = NutritionQuery::create()->filterByFOODID($food)->findOne();
  			$_SESSION['myplate'][] = $plate;
  			if ($plate->getJAY() == 1 || $plate->getFER() == 1 || $plate->getJJP() == 1)
  			{
  				$_SESSION['myfoodnow'][] = $plate;
  			}
  		}
  	else:
  		$_SESSION['myplate'] = array();
  	    $_SESSION['myfoodnow'] = array();
    endif;
  }
}
