<?php

/**
 * Text form base class.
 *
 * @method Text getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTextForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idtext'          => new sfWidgetFormInputHidden(),
      'app'             => new sfWidgetFormInputCheckbox(),
      'web'             => new sfWidgetFormInputCheckbox(),
      'destinationfile' => new sfWidgetFormInputText(),
      'idproject'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => false)),
      'created'         => new sfWidgetFormDateTime(),
      'updated'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'idtext'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idtext')), 'empty_value' => $this->getObject()->get('idtext'), 'required' => false)),
      'app'             => new sfValidatorBoolean(array('required' => false)),
      'web'             => new sfValidatorBoolean(array('required' => false)),
      'destinationfile' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'idproject'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'))),
      'created'         => new sfValidatorDateTime(array('required' => false)),
      'updated'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('text[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Text';
  }

}
