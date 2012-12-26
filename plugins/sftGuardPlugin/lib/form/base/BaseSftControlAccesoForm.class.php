<?php

/**
 * SftControlAcceso form base class.
 *
 * @method SftControlAcceso getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftControlAccesoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'caducidad'            => new sfWidgetFormDate(),
      'establoqueada'        => new sfWidgetFormInputText(),
      'causabloqueo'         => new sfWidgetFormInputText(),
      'preguntaolvidoclave'  => new sfWidgetFormInputText(),
      'respuestaolvidoclave' => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
      'caducidad'            => new sfValidatorDate(array('required' => false)),
      'establoqueada'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'causabloqueo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'preguntaolvidoclave'  => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'respuestaolvidoclave' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_control_acceso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftControlAcceso';
  }


}
