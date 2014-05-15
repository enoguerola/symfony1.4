<?php

/**
 * Text filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTextFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'app'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'web'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'destinationfile' => new sfWidgetFormFilterInput(),
      'idproject'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => true)),
      'created'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'app'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'web'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'destinationfile' => new sfValidatorPass(array('required' => false)),
      'idproject'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Project'), 'column' => 'idproject')),
      'created'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('text_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Text';
  }

  public function getFields()
  {
    return array(
      'idtext'          => 'Number',
      'app'             => 'Boolean',
      'web'             => 'Boolean',
      'destinationfile' => 'Text',
      'idproject'       => 'ForeignKey',
      'created'         => 'Date',
      'updated'         => 'Date',
    );
  }
}
