<?php

/**
 * SftPeriodo form base class.
 *
 * @method SftPeriodo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPeriodoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_uo'       => new sfWidgetFormPropelChoice(array('model' => 'SftUo', 'add_empty' => false)),
      'fechainicio' => new sfWidgetFormDate(),
      'fechafin'    => new sfWidgetFormDate(),
      'codigo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'estado'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_uo'       => new sfValidatorPropelChoice(array('model' => 'SftUo', 'column' => 'id')),
      'fechainicio' => new sfValidatorDate(array('required' => false)),
      'fechafin'    => new sfValidatorDate(array('required' => false)),
      'codigo'      => new sfValidatorString(array('max_length' => 255)),
      'descripcion' => new sfValidatorString(array('max_length' => 255)),
      'estado'      => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('sft_periodo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPeriodo';
  }


}
