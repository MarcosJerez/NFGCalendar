<?php

/**
 * SftUsuario form base class.
 *
 * @method SftUsuario getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_sfuser'      => new sfWidgetFormInputText(),
      'alias'          => new sfWidgetFormInputText(),
      'activo'         => new sfWidgetFormInputText(),
      'fecha_alta'     => new sfWidgetFormDate(),
      'fecha_baja'     => new sfWidgetFormDate(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id_culturapref' => new sfWidgetFormInputText(),
      'id_persona'     => new sfWidgetFormPropelChoice(array('model' => 'SftPersona', 'add_empty' => true)),
      'id_organismo'   => new sfWidgetFormPropelChoice(array('model' => 'SftOrganismo', 'add_empty' => true)),
      'idp'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_sfuser'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'alias'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'activo'         => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'fecha_alta'     => new sfValidatorDate(array('required' => false)),
      'fecha_baja'     => new sfValidatorDate(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id_culturapref' => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'id_persona'     => new sfValidatorPropelChoice(array('model' => 'SftPersona', 'column' => 'id', 'required' => false)),
      'id_organismo'   => new sfValidatorPropelChoice(array('model' => 'SftOrganismo', 'column' => 'id', 'required' => false)),
      'idp'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SftUsuario', 'column' => array('alias')))
    );

    $this->widgetSchema->setNameFormat('sft_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuario';
  }


}
