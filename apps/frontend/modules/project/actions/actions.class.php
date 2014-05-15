<?php

require_once dirname(__FILE__).'/../lib/projectGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/projectGeneratorHelper.class.php';

/**
 * project actions.
 *
 * @package    sf_sandbox
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectActions extends autoProjectActions
{
    /**
     * Elimina un proyecto
     * 
     * @param sfWebRequest $request
     */
    public function executeDelete(sfWebRequest $request)   
    { 
        $idProject = $request->getParameter('idproject');
        $numberProjects = ProjectTable::getCount($idProject);
        if((int)$numberProjects['numTexts'] > 0 ) {
            $this->getUser()->setFlash('error', 'No se puede eliminar el proyecto ya que tiene textos asignados.');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(
            new sfEvent($this, 'admin.delete_object', array(
                'object' => $this->getRoute()->getObject()
            )
            ));
           if ($this->getRoute()->getObject()->delete()) {      
               $this->getUser()->setFlash('notice', 'El proyecto se ha borrado correctamente');
           }
        }    
        $this->redirect('@project');
    }
}
