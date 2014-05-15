<?php

/**
 * Text form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TextForm extends BaseTextForm
{
  /**
   * Configura qué idiomas/campos se deben mostrar en el formulario de text
   */  
  public function configure()
  {
    unset(
      $this['created'],
      $this['updated']
    );
    $languages = LanguageTable::get();
    $listLang = array();
    foreach( $languages as $lang ) {
        $listLang[] = $lang['descriptor']; 
    }
    $this->embedI18n($listLang);
  }
}
