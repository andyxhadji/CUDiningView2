<?php

/**
 * all actions.
 *
 * @package    symfony
 * @subpackage all
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class allActions extends sfActions
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
  	if ($user):
  	  $_SESSION['foods'] = unserialize($user->getFood());
  	endif;
  	$_SESSION['all'] = nutritionQuery::create()->find();
  }
}
