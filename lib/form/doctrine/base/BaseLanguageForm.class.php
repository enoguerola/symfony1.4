<?php

/**
 * Language form base class.
 *
 * @method Language getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idlang'     => new sfWidgetFormInputHidden(),
      'descriptor' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idlang'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idlang')), 'empty_value' => $this->getObject()->get('idlang'), 'required' => false)),
      'descriptor' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('language[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Language';
  }

}
