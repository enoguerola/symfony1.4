<?php

class myUser extends sfBasicSecurityUser
{
    /**
     * Selección del texto
     * 
     * @return type
     */
    public function getText() 
    {
        return $this->getAttribute('text', '');
    }
    /**
     * Selección del texto
     * 
     * @param type $text
     * @return type
     */
    public function setText($text) 
    {
        return $this->setAttribute('text', $text);
    }
    /**
     * Selección del lenguaje
     * 
     * @param type $default
     * @return type
     */
    public function getLang($default = null) 
    {
        $lang = $this->getAttribute('lang'); 
        if (empty($lang) && !is_null($default)) {
            $lang = $default;
            $this->setAttribute('lang', $lang);
        }
        return $lang;
    }
    /**
     * Selección del lenguaje
     * 
     * @param type $lang
     * @return type
     */
    public function setLang($lang) 
    {
        return $this->setAttribute('lang', $lang);
    }    
    /**
     * Selección del id de proyecto
     * 
     * @param type $default
     * @return type
     */
    public function getIdProject($default = null) 
    {
        $idproject = $this->getAttribute('idProj'); 
        if (empty($idproject) && !is_null($default)) {
            $idproject = $default;
            $this->setAttribute('idProj', $idproject);
        }
        return $idproject;
    }
    /**
     * Selección del id de proyecto
     * 
     * @param type $idProj
     * @return type
     */
    public function setIdProject($idProj) 
    {
        return $this->setAttribute('idProj', $idProj);
    }   
    
    /**
     * Cambios realizados al importar
     *
     * @param type $textChanges
     * @return type 
     */
    public function getTextChanges($textChanges) 
    {
        return $this->getAttribute('textChanges');
    }    
    
    /**
     * Cambios realizados al importar
     *
     * @param type $textChanges
     * @return type 
     */
    public function setTextChanges($textChanges) 
    {
        return $this->setAttribute('textChanges', $textChanges);
    } 
}

