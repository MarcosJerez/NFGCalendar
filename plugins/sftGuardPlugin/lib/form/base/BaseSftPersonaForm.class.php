<?php

/**
 * SftPersona form base class.
 *
 * @method SftPersona getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPersonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nombre'                   => new sfWidgetFormInputText(),
      'apellido1'                => new sfWidgetFormInputText(),
      'apellido2'                => new sfWidgetFormInputText(),
      'id_tipodocidentificacion' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoDocIdentificacion', 'add_empty' => true)),
      'docidentificacion'        => new sfWidgetFormInputText(),
      'id_paisdocidentificacion' => new sfWidgetFormPropelChoice(array('model' => 'GenPais', 'add_empty' => true)),
      'sexo'                     => new sfWidgetFormInputText(),
      'fechanacimiento'          => new sfWidgetFormDate(),
      'observaciones'            => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'profesion'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'                   => new sfValidatorString(array('max_length' => 40)),
      'apellido1'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'apellido2'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'id_tipodocidentificacion' => new sfValidatorPropelChoice(array('model' => 'SftTipoDocIdentificacion', 'column' => 'id', 'required' => false)),
      'docidentificacion'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'id_paisdocidentificacion' => new sfValidatorPropelChoice(array('model' => 'GenPais', 'column' => 'id', 'required' => false)),
      'sexo'                     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'fechanacimiento'          => new sfValidatorDate(array('required' => false)),
      'observaciones'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'profesion'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPersona';
  }


}
