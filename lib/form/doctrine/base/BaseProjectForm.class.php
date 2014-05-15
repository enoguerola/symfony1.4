<?php

/**
 * Project form base class.
 *
 * @method Project getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'idproject' => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idproject' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('idproject')), 'empty_value' => $this->getObject()->get('idproject'), 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 64)),
    ));

    $this->widgetSchema->setNameFormat('project[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Project';
  }

}
