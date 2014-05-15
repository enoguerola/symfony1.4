<?php

require_once dirname(__FILE__).'/../lib/languageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/languageGeneratorHelper.class.php';

/**
 * language actions.
 *
 * @package    sf_sandbox
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class languageActions extends autoLanguageActions
{
    /**
     * Elimina un lenguaje
     * 
     * @param sfWebRequest $request
     */
    public function executeDelete(sfWebRequest $request)   
    {
        $idLang = $request->getParameter('idlang');
        $countLanguages = LanguageTable::getCount($idLang);
        if((int)$countLanguages[0] > 0 ) {
            $this->getUser()->setFlash('error', 'No se puede eliminar el lenguaje ya que tiene textos asignados.');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(
            new sfEvent($this, 'admin.delete_object', array(
                'object' => $this->getRoute()->getObject()
            )
            ));
           if ($this->getRoute()->getObject()->delete()) {      
               $this->getUser()->setFlash('notice', 'El lenguaje se ha borrado correctamente');
           }
        }    
        $this->redirect('@language');
    }
}
