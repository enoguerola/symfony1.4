<?php

/**
 * TextTranslation form base class.
 *
 * @method TextTranslation getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTextTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idtext'    => new sfWidgetFormInputHidden(),
      'paragraph' => new sfWidgetFormTextarea(),
      'status'    => new sfWidgetFormInputCheckbox(),
      'lang'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'idtext'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idtext')), 'empty_value' => $this->getObject()->get('idtext'), 'required' => false)),
      'paragraph' => new sfValidatorString(array('max_length' => 650, 'required' => false)),
      'status'    => new sfValidatorBoolean(array('required' => false)),
      'lang'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('text_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TextTranslation';
  }

}
