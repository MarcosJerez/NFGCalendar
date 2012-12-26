<?php

/**
 * SftAccesoAmbito form base class.
 *
 * @method SftAccesoAmbito getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAccesoAmbitoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_acceso'      => new sfWidgetFormInputHidden(),
      'id_ambito'      => new sfWidgetFormInputHidden(),
      'fechainicio'    => new sfWidgetFormDate(),
      'fechafin'       => new sfWidgetFormDate(),
      'fechacaducidad' => new sfWidgetFormDate(),
      'estado'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_acceso'      => new sfValidatorPropelChoice(array('model' => 'SftAcceso', 'column' => 'id', 'required' => false)),
      'id_ambito'      => new sfValidatorPropelChoice(array('model' => 'SftAmbito', 'column' => 'id', 'required' => false)),
      'fechainicio'    => new sfValidatorDate(array('required' => false)),
      'fechafin'       => new sfValidatorDate(array('required' => false)),
      'fechacaducidad' => new sfValidatorDate(array('required' => false)),
      'estado'         => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('sft_acceso_ambito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftAccesoAmbito';
  }


}
