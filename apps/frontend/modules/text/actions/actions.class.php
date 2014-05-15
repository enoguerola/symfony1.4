<?php

require_once dirname(__FILE__).'/../lib/textGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/textGeneratorHelper.class.php';

/**
 * text actions.
 *
 * @package    sf_sandbox
 * @subpackage text
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class textActions extends autoTextActions
{
  /**
   * Elimina un texto
   * 
   * @param sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $text = Doctrine_Core::getTable('Text')->find($id);
    
    if ($text instanceof Text) {
        $text->delete();
    }
    
    $this->redirect('home/index');
  }
}
