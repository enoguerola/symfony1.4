<?php

/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $session =  $this->getUser();
      $projects = ProjectTable::getAll();
      $languages = LanguageTable::getAll();
      
      if ( $request->isMethod(sfRequest::POST) ) {
        // Filtro
        if( !$request->getParameter('search') ) {
          $session->setLang($request->getParameter('lang'));
          $session->setIdproject($request->getParameter('idProj'));
        }
        // Buscador
        $session->setText($request->getParameter('search'));
      }
      
      $filter = TextTable::getSearch($session->getText(), $session->getIdProject(key($projects)));
     
      $this->languages = $languages;
      $this->texts = $filter;
      $this->language = $session->getLang();
      $this->project = $session->getIdProject(key($projects));
      $this->projects = $projects;
  }
}